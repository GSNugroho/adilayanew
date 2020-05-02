<form id="rincicek">
<table class="table table-bordered">
    <tr>
        <th>PERLENGKAPAN</th>
        <th>QTY</th>
        <th>CEKLIST</th>
    </tr>
    <tr id="hot_bo_put" style="display: none;">
        <td>BOOTH PUTIH</td>
        <td align="center">1</td>
        <td><p id="hoki_booth_put"></p></td>
    </tr>
    <tr id="hot_bo_pal" style="display: none;">
        <td>BOOTH PALLET</td>
        <td align="center">1</td>
        <td><p id="hoki_booth_pal"></p></td>
    </tr>
    <tr>
        <td>ROLL BANNER</td>
        <td>1</td>
        <td><p id="hoki_rol_banner"></p></td>
    </tr>
    <tr>
        <td>STICKER SET</td>
        <td>1</td>
        <td><p id="hoki_sticker"></p></td>
    </tr>
    <tr>
        <td>KOMPOR GAS</td>
        <td>1</td>
        <inpup id="hoki_kom_</p>gas">
    </tr>
    <tr>
        <td>SELANG + REGULATOR</td>
        <td align="center">1</td>
        <td><p id="hoki_se_reg"></p></td>
    </tr>
    <tr>
        <td>WAJAN</td>
        <td align="center">1</td>
        <td><p id="hoki_wajan"></p></td>
    </tr>
    <tr>
        <td>IRUS</td>
        <td align="center">1</td>
        <td><p id="hoki_irus"></p></td>
    </tr>
    <tr>
        <td>SOTIL</td>
        <td align="center">1</td>
        <td><p id="hoki_sotil"></p></td>
    </tr>
    <tr>
        <td>SARINGAN</td>
        <td align="center">1</td>
        <td><p id="hoki_saringan"></p></td>
    </tr>
    <tr>
        <td>TOPLES TEPUNG</td>
        <td align="center">1</td>
        <td><p id="hoki_toptep"></p></td>
    </tr>
    <tr>
        <td>TOPLES TAHU</td>
        <td align="center">1</td>
        <td><p id="hoki_toptahu"></p></td>
    </tr>
    <tr>
        <td>BASKOM STAINLESS</td>
        <td align="center">1</td>
        <td><p id="hoki_bas_st"></p></td>
    </tr>
    <tr>
        <td>TOPLES SAUS</td>
        <td align="center">1</td>
        <td><p id="hoki_to_sa"></p></td>
    </tr>
    <tr>
        <td>BOTOL SAUS PLASTIK</td>
        <td align="center">5</td>
        <td><p id="hoki_btoksap"></p></td>
    </tr>
    <tr>
        <td>BOTOL BUMBU KACA</td>
        <td>10</td>
        <td><p id="hoki_btol_kc"></p></td>
    </tr>
    <tr>
        <td>TALENAN</td>
        <td align="center">1</td>
        <td><p id="hoki_telenan"></p></td>
    </tr>
    <tr>
        <td>SENDOK</td>
        <td align="center">1</td>
        <td><p id="hoki_sendok"></p></td>
    </tr>
    <tr>
        <td>Pencapit</td>
        <td align="center">1</td>
        <td><p id="hoki_capitan"></p></td>
    </tr>
    <tr>
        <td>PISAU</td>
        <td align="center">1</td>
        <td><p id="hoki_pisau"></p></td>
    </tr>
    <tr>
        <td>KANEBO</td>
        <td align="center">1</td>
        <td><p id="hoki_kanebo"></p></td>
    </tr>
    <tr>
        <td>KAIN SERBET</td>
        <td align="center">2</td>
        <td><p id="hoki_serbet"></p></td>
    </tr>
    <tr>
        <td>TUSUKAN TAHU</td>
        <td align="center">1</td>
        <td><p id="hoki_tusukt"></p></td>
    </tr>
    <tr>
        <td>SERAGAM *Merah</td>
        <td align="center">2</td>
        <td><p id="hoki_sermer"></p></td>
    </tr>
    <tr>
        <td>CELEMEK MERAH</td>
        <td align="center">1</td>
        <td><p id="hoki_cel_mer"></p></td>
    </tr>
    <tr>
        <td>HAND GLOVES</td>
        <td align="center">1</td>
        <td><p id="hoki_ha_glo"></p></td>
    </tr>
    <tr>
        <td>SURAT KONTRAK</td>
        <td align="center">1</td>
        <td><p id="hoki_sukon"></p></td>
    </tr>
    <tr>
        <td>ID CARD</td>
        <td align="center">2</td>
        <td><p id="hoki_id_card"></p></td>
    </tr>
    <tr id="hot_rafia" style="display: none;">
        <td>RAFIA LAKBAN</td>
        <td>1</td>
        <td><p id="hoki_rafla"></p></td>
    </tr>
    <tr id="hot_lakban" style="display: none;">
        <td>LAKBAN</td>
        <td>1</td>
        <td><p id="hoki_lakban"></p></td>
    </tr>
    <tr>
        <td>KARDUS</td>
        <td id="hot_5" style="display: none;">5</td>
        <td id="hot_1" style="display: none;">1</td>
        <td><p id="hoki_kardus"></p></td>
    </tr>
    <tr id="hot_lampu" style="display: none;">
        <td>LAMPU SET</td>
        <td align="center">1</td>
        <td><p id="hoki_lampu"></p></td>
    </tr>
</table>
</form>
<script>
if(document.getElementById('rinciantahuhotking').style.display != 'none'){        
    if($('#hoki_booth_put').is(':checked')){
        var booth_putih = 1
    }else{
        var booth_putih = 0
    }
    if($('#hoki_booth_pal').is(':checked')){
        var booth_pallet = 1
    }else{
        var booth_pallet = 0
    }
    if($('#hoki_rol_banner').is(':checked')){
        var roll_baner = 1
    }else{
        var roll_baner = 0
    }
    if($('#hoki_sticker').is(':checked')){
        var stiker_set = 1
    }else{
        var stiker_set = 0
    }
    if($('#hoki_kom_gas').is(':checked')){
        var kom_gas = 1
    }else{
        var kom_gas = 0
    }
    if($('#hoki_se_reg').is(':checked')){
        var sel_reg = 1
    }else{
        var sel_reg = 0
    }
    if($('#hoki_wajan').is(':checked')){
        var wajan = 1
    }else{
        var wajan = 0
    }
    if($('#hoki_irus').is(':checked')){
        var irus = 1
    }else{
        var irus = 0
    }
    if($('#hoki_sotil').is(':checked')){
        var sotl = 1
    }else{
        var sotl = 0
    }
    if($('#hoki_saringan').is(':checked')){
        var saringan = 1
    }else{
        var saringan = 0
    }
    if($('#hoki_toptep').is(':checked')){
        var top_tep = 1
    }else{
        var top_tep = 0
    }
    if($('#hoki_toptahu').is(':checked')){
        var top_tahu = 1
    }else{
        var top_tahu = 0
    }
    if($('#hoki_bas_st').is(':checked')){
        var bas_stain = 1
    }else{
        var bas_stain = 0
    }
    if($('#hoki_to_sa').is(':checked')){
        var top_saus = 1
    }else{
        var top_saus = 0
    }
    if($('#hoki_btoksap').is(':checked')){
        var bot_saus = 1
    }else{
        var bot_saus = 0
    }
    if($('#hoki_btol_kc').is(':checked')){
        var bot_bum = 1
    }else{
        var bot_bum = 0
    }
    if($('#hoki_telenan').is(':checked')){
        var talenan = 1
    }else{
        var talenan = 0
    }
    if($('#hoki_sendok').is(':checked')){
        var sendok = 1
    }else{
        var sendok = 0
    }
    if($('#hoki_capitan').is(':checked')){
        var capitan = 1
    }else{
        var capitan = 0
    }
    if($('#hoki_pisau').is(':checked')){
        var pisau = 1
    }else{
        var pisau = 0
    }
    if($('#hoki_kanebo').is(':checked')){
        var kanebo = 1
    }else{
        var kanebo = 0
    }
    if($('#hoki_serbet').is(':checked')){
        var serbet = 1
    }else{
        var serbet = 0
    }
    if($('#hoki_tusukt').is(':checked')){
        var tusuk_tahu = 1
    }else{
        var tusuk_tahu = 0
    }
    if($('#hoki_sermer').is(':checked')){
        var seragam = 1
    }else{
        var seragam = 0
    }
    if($('#hoki_cel_mer').is(':checked')){
        var celmek = 1
    }else{
        var celmek = 0
    }
    if($('#hoki_ha_glo').is(':checked')){
        var hand_glo = 1
    }else{
        var hand_glo = 0
    }
    if($('#hoki_sukon').is(':checked')){
        var sur_kon = 1
    }else{
        var sur_kon = 0
    }
    if($('#hoki_id_card').is(':checked')){
        var idcard = 1
    }else{
        var idcard = 0
    }
    if($('#hoki_rafla').is(':checked')){
        var rafia_lak = 1
    }else{
        var rafia_lak = 0
    }
    if($('#hoki_lakban').is(':checked')){
        var lakban = 1
    }else{
        var lakban = 0
    }
    if($('#hoki_kardus').is(':checked')){
        var kardus = 1
    }else{
        var kardus = 0
    }
    if($('#hoki_lampu').is(':checked')){
        var lamp_set = 1
    }else{
        var lamp_set = 0
    }
    
    dataString = 'booth_putih='+booth_putih
    +'&booth_pallet='+booth_pallet
    +'&roll_baner='+roll_baner
    +'&stiker_set='+stiker_set
    +'&kom_gas='+kom_gas
    +'&sel_reg='+sel_reg
    +'&wajan='+wajan
    +'&irus='+irus
    +'&sotl='+sotl
    +'&saringan='+saringan
    +'&top_tep='+top_tep
    +'&top_tahu='+top_tahu
    +'&bas_stain='+bas_stain
    +'&top_saus='+top_saus
    +'&bot_saus='+bot_saus
    +'&bot_bum='+bot_bum
    +'&talenan='+talenan
    +'&sendok='+sendok
    +'&capitan='+capitan
    +'&pisau='+pisau
    +'&kanebo='+kanebo
    +'&serbet='+serbet
    +'&tusuk_tahu='+tusuk_tahu
    +'&seragam='+seragam
    +'&celmek='+celmek
    +'&hand_glo='+hand_glo
    +'&sur_kon='+sur_kon
    +'&idcard='+idcard
    +'&rafia_lak='+rafia_lak
    +'&lakban='+lakban
    +'&kardus='+kardus
    +'&lamp_set='+lamp_set
}
</script>