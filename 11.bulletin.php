<?php
    // 關閉錯誤訊息顯示
    error_reporting(0);
    // 用來記錄登入狀態
    session_start();
    // 檢查是否已登入
    if (!$_SESSION["id"]) {
        // 若尚未登入提示訊息
        echo "請先登入";
        // 3 秒後跳轉回登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        // 顯示歡迎訊息與功能連結
        echo "歡迎, ".$_SESSION["id"].
             "[<a href=12.logout.php>登出</a>] 
              [<a href=18.user.php>管理使用者</a>] 
              [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";
        // 連線資料庫
        $conn = mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
        // 從 bulletin 資料表抓出所有資料
        $result = mysqli_query($conn, "select * from bulletin");
        // 建立表格標題列
        echo "<table border=2>
                <tr>
                    <td></td>
                    <td>佈告編號</td>
                    <td>佈告類別</td>
                    <td>標題</td>
                    <td>佈告內容</td>
                    <td>發佈時間</td>
                </tr>";
        // 使用while逐筆讀取資料
        while ($row = mysqli_fetch_array($result)){
            // 每一列資料
            echo "<tr>
                    <td>
                        <a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
                        <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a>
                    </td>
                    <td>";
            // 顯示佈告編號
            echo $row["bid"];
            echo "</td><td>";
            // 顯示佈告類別
            echo $row["type"];
            echo "</td><td>"; 
            // 顯示標題
            echo $row["title"];
            echo "</td><td>";
            // 顯示內容
            echo $row["content"]; 
            echo "</td><td>";
            // 顯示發佈時間
            echo $row["time"];
            echo "</td></tr>";
        }
        // 結束表格
        echo "</table>";
    }
?>
