<?php
/*
zipファイルをWEBサーバー上で展開するPHPスクリプトです。
まず、事前に同じ名前のzipファイル名、ディレクトリ名、PHPスクリプトファイル名が、zipファイルを展開するWEBサーバー上に無いことを確認して下さい。
zipファイルとこのPHPファイルをWEBサーバーの同じディレクトリにアップロードし、ブラウザで
https://WEBサーバーURL/unzip.php
にアクセスするとアップロードしたzipファイルが展開されます。
*/

$zipfilename = 'assyuku.zip'; // ← 解凍するzipファイ名（assyuku.zip）に変更して下さい
$zipfilepass = getcwd().'/'.$zipfilename;

if(!is_file($zipfilepass)){
	exit("zipファイルが「".$zipfilepass."」にありません。");
}

function unzip($zipfilepass){
	return shell_exec("unzip $zipfilepass");
}

if($zip = unzip($zipfilepass)){
	echo '<html lang="ja"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>zipファイルが解凍されました。</title></head><body>';
	echo "zipファイルが解凍されました。<br />\n";
	echo "解凍ファイル：$zipfilename<br />\n";
	echo '<div style="overflow:auto; height:450px; border: #ccc 1px solid; margin:20px;">';
	echo "<pre>$zip</pre></div>\n";
	echo "$zipfilename: は正常に解凍されました。<br />\n";
	echo '</body></html>';
}else{
	echo("抽出に失敗しました: $zipfilepass\n");
}

?>