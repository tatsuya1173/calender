<?php
 
// 現在の年月を取得
$year = date('Y');
$month = date('n');

(int)$before_month = $_GET['zengetu'];
(int)$next_month = $_GET['zigetu'];


    if(isset($before_month)&&$before_month==1){
       
    }
    if(isset($next_month)&&$next_month==1){
       
    }

// 月末日を取得
$last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));
 
$calendar = array();
$j = 0;
 
// 月末日までループ
for ($i = 1; $i < $last_day + 1; $i++) {
 
    // 曜日を取得
    $week = date('w', mktime(0, 0, 0, $month, $i, $year));
 
    // 1日の場合
    if ($i == 1) {
 
        // 1日目の曜日までをループ
        for ($s = 1; $s <= $week; $s++) {
 
            // 前半に空文字をセット
            $calendar[$j]['day'] = '';
            $j++;
        }
    }
 
    // 配列に日付をセット
    $calendar[$j]['day'] = $i;
    $j++;
 
    // 月末日の場合
    if ($i == $last_day) {
 
        // 月末日から残りをループ
        for ($e = 1; $e <= 6 - $week; $e++) {
 
            // 後半に空文字をセット
            $calendar[$j]['day'] = '';
            $j++;
 
        }
 
    }
 
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
    table {
    width: 100%;
    }
    table th {
    background: #EEEEEE;
    }
    table th,
    table td {
    border: 1px solid #CCCCCC;
    text-align: center;
    padding: 5px;
    }
    </style>

</head>
<body>
    <?php echo $year; ?>年<?php echo $month; ?>月のカレンダー
    <br>
    <form action="" name="change" method="GET">
    <button type="submit" name="zengetu" value="1">前月</button>
    <button type="submit" name="zigetu" value="1">次月</button>
    </form>
    <br>
    <table>
        <tr>
            <th>日</th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th>土</th>
        </tr>
    
        <tr>
        <?php $cnt = 0; ?>
        <?php foreach ($calendar as $key => $value): ?>
    
            <td>
            <?php $cnt++; ?>
            <?php if ($cnt==1){?>
            <span style="color:red;"><?php echo $value['day']; ?></span>
            <?php }else if($cnt==7){ ?>
            <span style="color:aqua;"><?php echo $value['day']; ?></span>
            <?php }else{ ?>
            <?php echo $value['day']; ?>
            <?php } ?>
            </td>
    
        <?php if ($cnt == 7): ?>
        </tr>
        <tr>
        <?php $cnt = 0; ?>
        <?php endif; ?>
    
        <?php endforeach; ?>
        </tr>
    </table>
</body>
</html>
