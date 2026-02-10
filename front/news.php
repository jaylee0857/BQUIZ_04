
<h2 class="ct">最新消息</h2>
<p class="ct">典籍標題觀看詳細</p>


<div class="box">
    <table class="all">
        <tr>
            <td class="ct tt">標題</td>
        </tr>
        <tr>
            <td class="pp" onclick="tabs(1)">年終特賣會開跑了</td>
        </tr>
        <tr>
            <td class="pp" onclick="tabs(2)">情人節特惠活動</td>
        </tr>
    </table>
</div>

<div class="box">
    <table class="all">
        <tr>
            <td class="ct tt">標題</td>
            <td class="pp">年終特賣會開跑了</td>
        </tr>
        <tr>
            <td class="ct tt">內容</td>
            <td class="pp">即日期至年底，凡會員購物滿仟送佰，買越多送越多~</td>
        </tr>
    </table>
    <div class="ct">
                <input type="button" value="返回" onclick="tabs(0)">
    </div>
</div>
<div class="box">
    <table class="all">
        <tr>
            <td class="ct tt">標題</td>
            <td class="pp">情人節特惠活動</td>
        </tr>
        <tr>
            <td class="ct tt">內容</td>
            <td class="pp">為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~</td>
        </tr>
    </table>
    <div class="ct">
        <input type="button" value="返回" onclick="tabs(0)">
    </div>
</div>



<script>
    $(".box").hide();
    $(".box").eq(0).show();

    function tabs($arg){
        $(".box").hide();
        $(".box").eq($arg).show();
    }
</script>