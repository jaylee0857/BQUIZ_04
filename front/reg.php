<h3>會員註冊</h3>
<form action="" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp">
                <input type="text" name="name" id="name">
            </td>
        </tr>
        <tr>
            <td class="tt ct">
                帳號
            </td>
            <td class="pp">
                <input type="text" name="acc" id="acc">
                <input type="button" value="檢測帳號" onclick='check_acc()'>
            </td>
        </tr>
        <tr>
            <td class="tt ct">
                密碼
            </td>
            <td class="pp">
                <input type="text" name="pw" id="pw">
            </td>
        </tr>
        <tr>
            <td class="tt ct">
                電話
            </td>
            <td class="pp">
                <input type="text" name="tel" id="tel">
            </td>
        </tr>
        <tr>
            <td class="tt ct">
                地址
            </td>
            <td class="pp">
                <input type="text" name="addr" id="addr">
            </td>
        </tr>
        <tr>
            <td class="tt ct">
                信箱
            </td>
            <td class="pp">
                <input type="text" name="email" id="email">
            </td>
        </tr>
    </table>

    <div class="ct">
        <input type="button" value="確認" onclick="reg()">
        <input type="reset" value="重置">
    </div>
</form>
<script>
    function check_acc(){
        let acc = $("#acc").val();
        $.post("./api/acc.php",{acc},function(res){
            if (res == 1 || acc == 'admin') {
                alert("此帳號已存在,請重設其他帳號")
            }else{
                alert("此帳號可使用")

            }
        })
    }

    function reg(){
        let data = {
            acc:$("#acc").val(),
            pw:$("#pw").val(),
            name:$("#name").val(),
            tel:$("#tel").val(),
            addr:$("#addr").val(),
            email:$("#email").val(),
        };
        $.post("./api/acc.php",{acc:data.acc},function(res){
            if (res == 1 || acc == 'admin') {
                alert("此帳號已存在,請重設其他帳號")
                $("#acc").val("");
            }else{
                $.post("./api/reg.php",data,function(){
                    location.href='index.php?do=login';
                })
            }
        })
    }
</script>