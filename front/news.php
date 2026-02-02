<style>

    #tab1,#tab2{
        display: none;
    }
</style>
<h2>最新消息</h2>
<p class="ct" style="color:red">點擊標題觀看詳細</p>

<table class="all" id="all">
    <tr class="ct tt">
        <td>標題</td>
    </tr>
    <tr class="pp ct" onclick='sw_tab(1)'>
        <td>年終特賣會開跑了</td>
    </tr>
    <tr class="pp ct" onclick='sw_tab(2)'>
        <td>情人節特惠活動</td>
    </tr>

</table>

<div id="tab1">
    <table class="all" >
        <tr class="">
            <td class="tt">標題</td>
            <td class="pp">年終特賣會開跑了</td>
        </tr>
        <tr class="">
            <td class="tt">內容</td>
            <td class="pp">即日期至年底，凡會員購物滿仟送佰，買越多送越多~</td>
        </tr>
    </table>
    <div class="ct">
        <button onclick='sw_tab(3)'>返回</button>
    </div>
</div>

<div id="tab2">
    <table class="all" >
        <tr class="">
            <td class="tt">標題</td>
            <td class="pp">情人節特惠活動</td>
        </tr>
        <tr class="">
            <td class="tt">內容</td>
            <td class="pp">為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~</td>
        </tr>
    </table>
    <div class="ct">
        <button onclick='sw_tab(3)'>返回</button>
    </div>
</div>




<script>
function sw_tab(id){
    console.log('[12');
    
    if (id == 1) {
        $("#all").hide();
        $("#tab1").show();
        $("#tab2").hide();
    }
    if (id == 2) {
        $("#all").hide();
        $("#tab1").hide();
        $("#tab2").show();
    }
    if (id == 3) {
        $("#all").show();
        $("#tab1").hide();
        $("#tab2").hide();
    }
}
</script>