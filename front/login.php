<h3>第一次購物</h3>
<a href="?do=reg">
    <img src="./icon/0413.jpg" alt="">
</a>

<h2>會員登入</h2>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">驗證碼</td>
        <td class="pp">
            <?php
                $a =rand(10,99);
                $b =rand(10,99);
                $_SESSION['ans'] = $a+$b;
                echo "$a + $b"
            ?>
            <input type="text" name="code" id="ans">
        </td>
    </tr>
</table>

<div class="ct">
    <input type="button" value="確認" onclick="login()">
</div>

<script>
    function login(){
        let ans = $("#ans").val();
        let data = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),

        }
        $.post("./api/check_ans.php",{ans},(res)=>{
            if (res>0) {
                $.post("./api/login.php",data,(res)=>{
                    if (res==1) {
                        location.href="index.php"
                    }else{
                        alert("帳號或是密碼錯誤")
                        location.reload()
                    }
                })
            }else{
                alert("驗證碼錯誤,請重填");
            }
        })
    }
</script>