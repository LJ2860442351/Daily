<?php
ini_set('memory_limit', '10M'); // 内存限制1M
// 生成随机的字符串
function generate(string $filename, int $batch = 1000, int $batchSize = 10000)
{
    if (file_exists($filename)) {
        echo '文件已经存在<br/>';
        return;
    }
    for ($i = 0; $i < $batch; $i++) {
        $str = '';
        for ($j = 0; $j < $batchSize; $j++) {
            $str .= rand($batch, $batchSize) . PHP_EOL; //生成随机数
        }
        file_put_contents($filename, $str, FILE_APPEND); //追加模式写入文件
    }
    echo '创建成功<br/>';
    return;
}

// hash取模方式将文件分散到n个文件当中
function splitFile(string $filename, int $mod = 20, string $dir = 'files')
{
    if (!is_dir($dir)) {
        mkdir($dir);
    }

    $fp = fopen($filename, 'r'); //只读模式打开文件

    while (!feof($fp)) {
        $line     = fgets($fp);
        $n        = crc32(hash('md5', $line)) % $mod; //hash 取模
        $filepath = $dir . '/' . $n . '.txt'; //文件输出路径
        file_put_contents($filename, $line, FILE_APPEND); //追加模式写入文件
    }
    fclose($fp);
    echo '执行成功';
    return ;

}

//查找一个文件相同的记录输出到指定的文件中
function search(string $inputFileName, $outputFileName = 'output.txt')
{
    $table = [];

    $fp = fopen($inputFileName, 'r'); //只读的形式打开文件

    while (!feof($fp)) {
        $line                                 = fgets($fp);
        !isset($table[$line]) ? $table[$line] = 1 : $table[$line]++; //未设置的值加1
    }

    foreach ($table as $line => $count) {
        file_put_contents($outputFileName, $line, FILE_APPEND); //追加模式写入文件
    }
}

// // 从指定目录下的文件分别找出相同记录输出到指定文件中
function searchAll($dirs = 'files', outputFileName = 'output.txt')
{
    $files = scandir($dirs);

    foreach ($files as $file) {
        $filepat = $dirs . '/' . $file;
        if (is_file($filepat)) {
            search($filepath, $outputFileName);
        }
    }
}

// generate('a.txt', 10);
// generate('b.txt', 10);

splitFile('a.txt');
// splitFile('b.txt');

//查找相同的记录
// searchAll('files', 'output.txt');
