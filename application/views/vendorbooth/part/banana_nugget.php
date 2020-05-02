<form id="rincicek">
<table class="table table-boredered">
    <tr>
        <th>PERLENGKAPAN</th>
        <th>QTY</th>
        <th>CEKLIST</th>
    </tr>
    <tr id="banug_put" style="display: none;">
        <td>BOOTH PUTIH</td>
        <td align="center">1</td>
        <td><p id="banug_booth_putih"></p></td>
    </tr>
    <tr id="banug_pall" style="display: none;">
        <td>BOOTH PALLET</td>
        <td align="center">1</td>
        <td><p id="banug_booth_pallet"></p></td>
    </tr>
    <tr>
        <td>ROLL BANNER</td>
        <td align="center">1</td>
        <td><p id="banug_rol_banner"></p></td>
    </tr>
    <tr>
        <td>STICKER</td>
        <td align="center">1</td>
        <td><p id="banug_sticker"></p></td>
    </tr>
    <tr>
        <td>STICKER TOPLES</td>
        <td align="center">1</td>
        <td><p id="banug_stickert"></p></td>
    </tr>
    <tr>
        <td>KOMPOR GAS</td>
        <td align="center">1</td>
        <td><p id="banug_kom_gas"></p></td>
    </tr>
    <tr>
        <td>SELANG + REGULATOR</td>
        <td align="center">1</td>
        <td><p id="banug_se_reg"></p></td>
    </tr>
    <tr>
        <td>MIXER SET</td>
        <td align="center">1</td>
        <td><p id="banug_mixset"></p></td>
    </tr>
    <tr>
        <td>WAJAN</td>
        <td align="center">1</td>
        <td><p id="banug_wajan"></p></td>
    </tr>
    <tr>
        <td>SOTIL</td>
        <td align="center">1</td>
        <td><p id="banug_sotil"></p></td>
    </tr>
    <tr>
        <td>IRUS</td>
        <td align="center">1</td>
        <td><p id="banug_irus"></p></td>
    </tr>
    <tr>
        <td>SARINGAN</td>
        <td align="center">1</td>
        <td><p id="banug_saringan"></p></td>
    </tr>
    <tr>
        <td>TOPLES WADAH PISANG</td>
        <td align="center">1</td>
        <td><p id="banug_towapi"></p></td>
    </tr>
    <tr>
        <td>TOPLES ADONAN</td>
        <td align="center">1</td>
        <td><p id="banug_topad"></p></td>
    </tr>
    <tr>
        <td>TOPLES TOPPING</td>
        <td align="center">7</td>
        <td><p id="banug_toptop"></p></td>
    </tr>
    <tr>
        <td>TOPLES SELAI</td>
        <td align="center">3</td>
        <td><p id="banug_topsel"></p></td>
    </tr>
    <tr>
        <td>NAMPAN STAINLESS</td>
        <td align="center">1</td>
        <td><p id="banug_namst"></p></td>
    </tr>
    <tr>
        <td>PARUTAN KEJU</td>
        <td align="center">1</td>
        <td><p id="banug_parkej"></p></td>
    </tr>
    <tr>
        <td>PISAU</td>
        <td align="center">1</td>
        <td><p id="banug_pisau"></p></td>
    </tr>
    <tr>
        <td>SENDOK</td>
        <td align="center">1</td>
        <td><p id="banug_sendok"></p></td>
    </tr>
    <tr>
        <td>SOLET PLASTIK</td>
        <td align="center">1</td>
        <td><p id="banug_sopla"></p></td>
    </tr>
    <tr>
        <td>KUAS</td>
        <td align="center">1</td>
        <td><p id="banug_kuas"></p></td>
    </tr>
    <tr>
        <td>HANDGLOVES</td>
        <td align="center">1</td>
        <td><p id="banug_hand_glo"></p></td>
    </tr>
    <tr>
        <td>KANEBO</td>
        <td align="center">1</td>
        <td><p id="banug_kanebo"></p></td>
    </tr>
    <tr>
        <td>SERBET</td>
        <td align="center">1</td>
        <td><p id="banug_serbet"></p></td>
    </tr>
    <tr>
        <td>SERAGAM *KUNING</td>
        <td align="center">2</td>
        <td><p id="banug_sekun"></p></td>
    </tr>
    <tr>
        <td>SURAT KONTRAK</td>
        <td align="center">1</td>
        <td><p id="banug_sukon"></p></td>
    </tr>
    <tr>
        <td>ID CARD</td>
        <td align="center">2</td>
        <td><p id="banug_id_ca"></p></td>
    </tr>
    <tr>
        <td>CELEMEK KUNING</td>
        <td align="center">1</td>
        <td><p id="banug_cel_kun"></p></td>
    </tr>
    <tr id="banu_lampu" style="display: none;">
        <td>LAMPU SET</td>
        <td align="center">1</td>
        <td><p id="banug_lampu"></p></td>
    </tr>
</table>
</form>
<script>
if(document.getElementById('rincianbanananugget').style.display != 'none'){
    if($('#banug_booth_putih').is(':checked')){
        var booth_putih = 1
    }else{
        var booth_putih = 0
    }
    if($('#banug_booth_pallet').is(':checked')){
        var booth_pallet = 1
    }else{
        var booth_pallet = 0
    }
    if($('#banug_rol_banner').is(':checked')){
        var roll_banner = 1
    }else{
        var roll_banner = 0
    }
    if($('#banug_sticker').is(':checked')){
        var sticker = 1
    }else{
        var sticker = 0
    }
    if($('#banug_stickert').is(':checked')){
        var stiker_top = 1
    }else{
        var stiker_top = 0
    }
    if($('#banug_kom_gas').is(':checked')){
        var kom_gas = 1
    }else{
        var kom_gas = 0
    }
    if($('#banug_se_reg').is(':checked')){
        var selreg = 1
    }else{
        var selreg = 0
    }
    if($('#banug_mixset').is(':checked')){
        var mix_set = 1
    }else{
        var mix_set = 0
    }
    if($('#banug_wajan').is(':checked')){
        var wajan = 1
    }else{
        var wajan = 0
    }
    if($('#banug_sotil').is(':checked')){
        var sotil = 1
    }else{
        var sotil = 0
    }
    if($('#banug_irus').is(':checked')){
        var irus = 1
    }else{
        var irus = 0
    }
    if($('#banug_saringan').is(':checked')){
        var saringan = 1
    }else{
        var saringan = 0
    }
    if($('#banug_towapi').is(':checked')){
        var top_wad_pis = 1
    }else{
        var top_wad_pis = 0
    }
    if($('#banug_topad').is(':checked')){
        var top_adonan = 1
    }else{
        var top_adonan = 0
    }
    if($('#banug_toptop').is(':checked')){
        var top_toping = 1
    }else{
        var top_toping = 0
    }
    if($('#banug_topsel').is(':checked')){
        var top_selai = 1
    }else{
        var top_selai = 0
    }
    if($('#banug_namst').is(':checked')){
        var nampan_stain = 1
    }else{
        var nampan_stain = 0
    }
    if($('#banug_parkej').is(':checked')){
        var parutan_kej = 1
    }else{
        var parutan_kej = 0
    }
    if($('#banug_pisau').is(':checked')){
        var pisau = 1
    }else{
        var pisau = 0
    }
    if($('#banug_sendok').is(':checked')){
        var sendok = 1
    }else{
        var sendok = 0
    }
    if($('#banug_sopla').is(':checked')){
        var sol_plastik = 1
    }else{
        var sol_plastik = 0
    }
    if($('#banug_kuas').is(':checked')){
        var kuas = 1
    }else{
        var kuas = 0
    }
    if($('#banug_hand_glo').is(':checked')){
        var hand_glo = 1
    }else{
        var hand_glo = 0
    }
    if($('#banug_kanebo').is(':checked')){
        var kanebo = 1
    }else{
        var kanebo = 0
    }
    if($('#banug_serbet').is(':checked')){
        var serbet = 1
    }else{
        var serbet = 0
    }
    if($('#banug_sekun').is(':checked')){
        var ser_kun = 1
    }else{
        var ser_kun = 0
    }
    if($('#banug_sukon').is(':checked')){
        var surkon = 1
    }else{
        var surkon = 0
    }
    if($('#banug_id_ca').is(':checked')){
        var idcard = 1
    }else{
        var idcard = 0
    }
    if($('#banug_cel_kun').is(':checked')){
        var cel_kun = 1
    }else{
        var cel_kun = 0
    }
    if($('#banug_lampu').is(':checked')){
        var lam_set = 1
    }else{
        var lam_set = 0
    }
    var dataString = 'booth_putih='+booth_putih
    +'&booth_pallet='+booth_pallet
    +'&roll_banner='+roll_banner
    +'&sticker='+sticker
    +'&stiker_top='+stiker_top
    +'&kom_gas='+kom_gas
    +'&selreg='+selreg
    +'&mix_set='+mix_set
    +'&wajan='+wajan
    +'&sotil='+sotil
    +'&irus='+irus
    +'&saringan='+saringan
    +'&top_wad_pis='+top_wad_pis
    +'&top_adonan='+top_adonan
    +'&top_toping='+top_toping
    +'&top_selai='+top_selai
    +'&nampan_stain='+nampan_stain
    +'&parutan_kej='+parutan_kej
    +'&pisau='+pisau
    +'&sendok='+sendok
    +'&sol_plastik='+sol_plastik
    +'&kuas='+kuas
    +'&hand_glo='+hand_glo
    +'&kanebo='+kanebo
    +'&serbet='+serbet
    +'&ser_kun='+ser_kun
    +'&surkon='+surkon
    +'&idcard='+idcard
    +'&lam_set='+lam_set
}
</script>