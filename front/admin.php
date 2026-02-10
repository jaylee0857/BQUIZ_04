<h3>管理登入</h3>

<table class="all">
    <tr>
        <td class="tt">帳號</td>
        <td class="pp">
            <input type="text" name="acc" id="acc">
        </td>
    </tr>
    <tr>
        <td class="tt">密碼</td>
        <td class="pp">
            <input type="text" name="pw" id="pw">
        </td>
    </tr>
    <tr>
        <td class="tt">驗證碼</td>
        <td class="pp">
            <?php
                $a = rand(10,99);
                $b = rand(10,99);
                $_SESSION['ans'] = $a+$b;
                // echo $a+$b;
                // echo "<br>";

                // echo $_SESSION['ans'] ;

                // echo "<br>";
                echo "$a+$b=";
            ?>
            <input type="text" name="ans" id="ans">
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="login()">確認</button>
</div>

<script>

    function login(){

        let acc =$("#acc").val();
        let pw =$("#pw").val();
        let ans =$("#ans").val();

        $.post("./api/ans.php",{ans},function(res){
            console.log(res);
            
            if (res ==1) {
                $.post("./api/login_admin.php",{pw,acc},function(res){
                    if (res == 1) {
                        location.href="back.php"
                    }else{
                        alert("對不起,您輸入的帳號或密碼有誤請您重新登入")
                    }
                })
            }else{
                alert("對不起,您輸入的驗證碼有誤請您重新登入")
            }
        })



    }



</script>