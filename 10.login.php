<?php
$conn = mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
$result = mysqli_query($conn, "select * from user");
// 預設登入狀態為 FALSE
$login = FALSE;
// 使用 while 迴圈一筆一筆讀取查詢結果
while ($row = mysqli_fetch_array($result)) {
    // 對比使用者輸入的帳號與密碼是否與資料庫一致
    if (($_POST["id"] == $row["id"]) && ($_POST["pwd"] == $row["pwd"])) {
        // 有任一筆符合將登入狀態設為TRUE
        $login = TRUE;
    }
} 
// 判斷是否登入成功
if ($login == TRUE) {
    //記錄登入狀態
    session_start();
    // 將使用者id 存入session
    $_SESSION["id"] = $_POST["id"];
    // 顯示登入成功訊息
    echo "登入成功";
    // 3秒後跳轉到 bulletin 頁面
    echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
} else {
    // 登入失敗顯示錯誤訊息
    echo "帳號/密碼 錯誤";
    // 3 秒後跳回登入頁面
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
}
?>
