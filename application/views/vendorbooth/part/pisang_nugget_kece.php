<form id="rincicek">
<table class="table table-bordered">
    <tr>    
        <th>PERLENGKAPAN</th>
        <th>QTY</th>
        <th>CEKLIST</th>
    </tr>
    <tr id="psangke_bo_put" style="display: none;">
        <td>BOOTH PUTIH</td>
        <td>1</td>
        <inpup id="pinuke_booth_pu</p>tih">
    </tr>
    <tr id="psangke_bo_pall" style="display: none;">
        <td>BOOTH PALLET</td>
        <td>1</td>
        <inpup id="pinuke_booth_pal</p>let">
    </tr>
    <tr>
        <td>ROLL BANNER</td>
        <td>1</td>
        <inpup id="pinuke_rol_ban</p>ner">
    </tr>
    <tr>
        <td>STICKER</td>
        <td>1</td>
        <inpup id="pinuke_stic</p>ker">
    </tr>
    <tr>
        <td>STICKER TOPLES</td>
        <td>1</td>
        <inpup id="pinuke_stick</p>ert">
    </tr>
    <tr id="psangke_rafia" style="display: none;">
        <td>RAFIA LAKBAN</td>
        <td>1</td>
        <inpup id="pinuke_ra</p>fla">
    </tr>
    <tr id="psangke_lakban" style="display: none;">
        <td>LAKBAN</td>
        <td>1</td>
        <inpup id="pinuke_lak</p>ban">
    </tr>
    <tr>
        <td>KARDUS</td>
        <td id="psangke_5" style="display: none;">5</td>
        <td id="psangke_1" style="display: none;">1</td>
        <inpup id="pinuke_kar</p>dus">
    </tr>
    <tr>
        <td>KOMPOR GAS</td>
        <td>1</td>
        <inpup id="pinuke_kom_</p>gas">
    </tr>
    <tr>
        <td>SELANG + REGULATOR</td>
        <td align="center">1</td>
        <td><p id="pinuke_se_reg"></p></td>
    </tr>
    <tr>
        <td>MIXER SET</td>
        <td align="center">1</td>
        <td><p id="pinuke_mixset"></p></td>
    </tr>
    <tr>
        <td>WAJAN</td>
        <td align="center">1</td>
        <td><p id="pinuke_wajan"></p></td>
    </tr>
    <tr>
        <td>SOTIL</td>
        <td align="center">1</td>
        <td><p id="pinuke_sotil"></p></td>
    </tr>
    <tr>
        <td>IRUS</td>
        <td align="center">1</td>
        <td><p id="pinuke_irus"></p></td>
    </tr>
    <tr>
        <td>SARINGAN</td>
        <td align="center">1</td>
        <td><p id="pinuke_saringan"></p></td>
    </tr>
    <tr>
        <td>TOPLES WADAH PISANG</td>
        <td align="center">1</td>
        <td><p id="pinuke_towapi"></p></td>
    </tr>
    <tr>
        <td>TOPLES ADONAN</td>
        <td align="center">1</td>
        <td><p id="pinuke_topad"></p></td>
    </tr>
    <tr>
        <td>TOPLES TOPPING</td>
        <td align="center">7</td>
        <td><p id="pinuke_toptop"></p></td>
    </tr>
    <tr>
        <td>TOPLES SELAI</td>
        <td align="center">3</td>
        <td><p id="pinuke_topsel"></p></td>
    </tr>
    <tr>
        <td>BOTOL COKELAT</td>
        <td align="center">1</td>
        <td><p id="pinuke_bocok"></p></td>
    </tr>
    <tr>
        <td>NAMPAN STAINLESS</td>
        <td align="center">1</td>
        <td><p id="pinuke_namst"></p></td>
    </tr>
    <tr>
        <td>PARUTAN KEJU</td>
        <td align="center">1</td>
        <td><p id="pinuke_parkej"></p></td>
    </tr>
    <tr>
        <td>PISAU</td>
        <td align="center">1</td>
        <td><p id="pinuke_pisau"></p></td>
    </tr>
    <tr>
        <td>SENDOK</td>
        <td align="center">1</td>
        <td><p id="pinuke_sendok"></p></td>
    </tr>
    <tr>
        <td>SOLET PLASTIK</td>
        <td align="center">1</td>
        <td><p id="pinuke_sopla"></p></td>
    </tr>
    <tr>
        <td>KUAS</td>
        <td align="center">1</td>
        <td><p id="pinuke_kuas"></p></td>
    </tr>
    <tr>
        <td>HANDGLOVES</td>
        <td align="center">1</td>
        <td><p id="pinuke_hand_glo"></p></td>
    </tr>
    <tr>
        <td>KANEBO</td>
        <td align="center">1</td>
        <td><p id="pinuke_kanebo"></p></td>
    </tr>
    <tr>
        <td>SERBET</td>
        <td align="center">1</td>
        <td><p id="pinuke_serbet"></p></td>
    </tr>
    <tr>
        <td>SERAGAM *KUNING</td>
        <td align="center">2</td>
        <td><p id="pinuke_sekun"></p></td>
    </tr>
    <tr>
        <td>SURAT KONTRAK</td>
        <td align="center">1</td>
        <td><p id="pinuke_sukon"></p></td>
    </tr>
    <tr>
        <td>ID CARD</td>
        <td align="center">2</td>
        <td><p id="pinuke_id_ca"></p></td>
    </tr>
    <tr>
        <td>CELEMEK KUNING</td>
        <td align="center">1</td>
        <td><p id="pinuke_cel_kun"></p></td>
    </tr>
    <tr id="psangke_lampu" style="display: none;">
        <td>LAMPU SET</td>
        <td align="center">1</td>
        <td><p id="pinuke_lampu"></p></td>
    </tr>
</table>
</form>
<script>
if(document.getElementById('rincianpisangnugget').style.display != 'none'){    
    if($('#pinuke_booth_putih').is(':checked')){
        var booth_putih = 1
    }else{
        var booth_putih = 0
    }
    if($('#pinuke_booth_pallet').is(':checked')){
        var booth_palet = 1
    }else{
        var booth_palet = 0
    }
    if($('#pinuke_rol_banner').is(':checked')){
        var roll_banner = 1
    }else{
        var roll_banner = 0
    }
    if($('#pinuke_sticker').is(':checked')){
        var stiker = 1
    }else{
        var stiker = 0
    }
    if($('#pinuke_stickert').is(':checked')){
        var stiker_top = 1
    }else{
        var stiker_top = 0
    }
    if($('#pinuke_rafla').is(':checked')){
        var rafia_lak = 1
    }else{
        var rafia_lak = 0
    }
    if($('#pinuke_lakban').is(':checked')){
        var lakban = 1
    }else{
        var lakban = 0
    }
    if($('#pinuke_kardus').is(':checked')){
        var kardus = 1
    }else{
        var kardus = 0
    }
    if($('#pinuke_kom_gas').is(':checked')){
        var kom_gas = 1
    }else{
        var kom_gas = 0
    }
    if($('#pinuke_se_reg').is(':checked')){
        var sel_reg = 1
    }else{
        var sel_reg = 0
    }
    if($('#pinuke_mixset').is(':checked')){
        var mixer_set = 1
    }else{
        var mixer_set = 0
    }
    if($('#pinuke_wajan').is(':checked')){
        var wajan = 1
    }else{
        var wajan = 0
    }
    if($('#pinuke_sotil').is(':checked')){
        var sotil = 1
    }else{
        var sotil = 0
    }
    if($('#pinuke_irus').is(':checked')){
        var irus = 1
    }else{
        var irus = 0
    }
    if($('#pinuke_saringan').is(':checked')){
        var saringan = 1
    }else{
        var saringan = 0
    }
    if($('#pinuke_towapi').is(':checked')){
        var top_pis = 1
    }else{
        var top_pis = 0
    }
    if($('#pinuke_topad').is(':checked')){
        var top_ado = 1
    }else{
        var top_ado = 0
    }
    if($('#pinuke_toptop').is(':checked')){
        var top_top = 1
    }else{
        var top_top = 0
    }
    if($('#pinuke_topsel').is(':checked')){
        var top_sel = 1
    }else{
        var top_sel = 0
    }
    if($('#pinuke_bocok').is(':checked')){
        var bot_cok = 1
    }else{
        var bot_cok = 0
    }
    if($('#pinuke_namst').is(':checked')){
        var nampan_stain = 1
    }else{
        var nampan_stain = 0
    }
    if($('#pinuke_parkej').is(':checked')){
        var parutan = 1
    }else{
        var parutan = 0
    }
    if($('#pinuke_pisau').is(':checked')){
        var pisau = 1
    }else{
        var pisau = 0
    }
    if($('#pinuke_sendok').is(':checked')){
        var sendok = 1
    }else{
        var sendok = 0
    }
    if($('#pinuke_sopla').is(':checked')){
        var sol_plas = 1
    }else{
        var sol_plas = 0
    }
    if($('#pinuke_kuas').is(':checked')){
        var kuas = 1
    }else{
        var kuas = 0
    }
    if($('#pinuke_hand_glo').is(':checked')){
        var hand_glo = 1
    }else{
        var hand_glo = 0
    }
    if($('#pinuke_kanebo').is(':checked')){
        var kanebo = 1
    }else{
        var kanebo = 0
    }
    if($('#pinuke_serbet').is(':checked')){
        var serbet = 1
    }else{
        var serbet = 0
    }
    if($('#pinuke_sekun').is(':checked')){
        var seragam = 1
    }else{
        var seragam = 0
    }
    if($('#pinuke_sukon').is(':checked')){
        var sur_kon = 1
    }else{
        var sur_kon = 0
    }
    if($('#pinuke_id_ca').is(':checked')){
        var idcard = 1
    }else{
        var idcard = 0
    }
    if($('#pinuke_cel_kun').is(':checked')){
        var celmek = 1
    }else{
        var celmek = 0
    }
    if($('#pinuke_lampu').is(':checked')){
        var lamp_set = 1
    }else{
        var lamp_set = 0
    }

    dataString = 'booth_putih='+booth_putih
    +'&booth_palet='+booth_palet
    +'&roll_banner='+roll_banner
    +'&stiker='+stiker
    +'&stiker_top='+stiker_top
    +'&rafia_lak='+rafia_lak
    +'&lakban='+lakban
    +'&kardus='+kardus
    +'&kom_gas='+kom_gas
    +'&sel_reg='+sel_reg
    +'&mixer_set='+mixer_set
    +'&wajan='+wajan
    +'&sotil='+sotil
    +'&irus='+irus
    +'&saringan='+saringan
    +'&top_pis='+top_pis
    +'&top_ado='+top_ado
    +'&top_top='+top_top
    +'&top_sel='+top_sel
    +'&bot_cok='+bot_cok
    +'&nampan_stain='+nampan_stain
    +'&parutan='+parutan
    +'&pisau='+pisau
    +'&sendok='+sendok
    +'&sol_plas='+sol_plas
    +'&kuas='+kuas
    +'&hand_glo='+hand_glo
    +'&kanebo='+kanebo
    +'&serbet='+serbet
    +'&seragam='+seragam
    +'&sur_kon='+sur_kon
    +'&idcard='+idcard
    +'&celmek='+celmek
    +'&lamp_set='+lamp_set
}
</script>