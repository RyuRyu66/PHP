<html>
    <head>
        <!-- 設定頁面標題 -->
        <title>使用者管理</title>
    </head>
    <body>
    <?php
        // 關閉錯誤訊息顯示
        error_reporting(0);
        // 啟動 session
        session_start();
        // 如果沒有登入
        if (!$_SESSION["id"]) {
            // 顯示提示訊息
            echo "請登入帳號";
            // 3 秒後跳回登入頁面
            echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
        }
        else{   
            // 已登入顯示使用者管理頁面
            echo "<h1>使用者管理</h1>
                <!-- 功能選單 -->
                [<a href=14.user_add_form.php>新增使用者</a>] 
                [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <!-- 建立表格 -->
                <table border=1>
                    <tr>
                        <td></td>
                        <td>帳號</td>
                        <td>密碼</td>
                    </tr>";
            // 連接資料庫
            $conn = mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
            // 查詢user資料表所有資料
            $result = mysqli_query($conn, "select * from user");
            // 逐筆讀取資料
            while ($row = mysqli_fetch_array($result)){
                // 顯示每一筆使用者資料
                echo "<tr>
                        <td>
                            <!-- 修改與刪除功能 -->
                            <a href=19.user_edit_form.php?id={$row['id']}>修改</a>||
                            <a href=17.user_delete.php?id={$row['id']}>刪除</a>
                        </td>
                        <!-- 顯示帳號 -->
                        <td>{$row['id']}</td>
                        <!-- 顯示密碼 -->
                        <td>{$row['pwd']}</td>
                      </tr>";
            }
            // 結束表格
            echo "</table>";
        }
    ?> 
    </body>
</html>
