<h2 class="ct">會員註冊</h2>

<form action="" method="post">
    <table class="all">
        <tr>
            <td class="tt">姓名</td>
            <td class="pp">
                <input type="text" name="name" id="name">
            </td>
        </tr>
        <tr>
            <td class="tt">帳號</td>
            <td class="pp">
                <input type="text" name="acc" id="acc">
            <input type="button" value="檢測帳號" onclick="acc_check()">


            </td>
        </tr>
        <tr>
            <td class="tt">密碼</td>
            <td class="pp">
                <input type="text" name="pw" id="pw">

            </td>
        </tr>
        <tr>
            <td class="tt">電話</td>
            <td class="pp">
                <input type="text" name="tel" id="tel">

            </td>
        </tr>
        <tr>
            <td class="tt">住址</td>
            <td class="pp">
                <input type="text" name="addr" id="addr">

            </td>
        </tr>
        <tr>
            <td class="tt">電子信箱</td>
            <td class="pp">
                <input type="text" name="email" id="email">
            </td>
        </tr>
    </table>
<div class="ct">
    <input type="button" value="註冊" onclick="reg()">
    <input type="reset" value="重置">
</div>
</form>

<script>
    function acc_check(){
        let acc =$("#acc").val();
            $.post("./api/acc.php",{acc},function(res){
                if (res == 1 || acc=='admin') {
                    alert("帳號已存在, 不可使用");
                }
                else{
                    alert("帳號可使用");
                }
            })
    }

    function reg(){
        let name = $("#name").val();
        let acc = $("#acc").val();
        let pw = $("#pw").val();
        let tel = $("#tel").val();
        let addr = $("#addr").val();
        let email = $("#email").val();
    
        $.post("./api/acc.php",{acc},function(res){
            if (res == 1 || acc=='admin') {
                alert("帳號已存在, 不可使用");
            }
            else{
                $.post("./api/reg.php",{name,acc,pw,tel,addr,email},function(){
                    location.href="?do=login"
                })
            }
        })


    }
        

</script>