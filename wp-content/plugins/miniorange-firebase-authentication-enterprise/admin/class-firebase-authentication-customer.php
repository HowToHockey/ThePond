<?php


class MO_Firebase_Customer
{
    public $email;
    public $phone;
    private $defaultCustomerKey = "\x31\x36\x35\65\65";
    private $defaultApiKey = "\146\106\x64\62\130\143\x76\x54\107\x44\145\x6d\x5a\166\x62\167\x31\142\x63\125\x65\163\116\x4a\x57\x45\x71\113\142\x62\x55\161";
    function create_customer()
    {
        $hd = get_option("\x68\157\163\164\137\x6e\141\x6d\145") . "\57\155\x6f\x61\163\x2f\162\x65\163\x74\x2f\143\x75\163\164\157\155\145\x72\57\x61\144\x64";
        $this->email = get_option("\x6d\x6f\137\146\x69\162\x65\x62\141\x73\x65\137\141\165\x74\x68\145\x6e\164\151\143\141\x74\x69\157\x6e\137\141\x64\x6d\151\x6e\x5f\145\x6d\x61\x69\x6c");
        $this->phone = get_option("\155\157\x5f\x66\151\162\x65\142\x61\163\x65\137\141\165\x74\150\145\156\164\151\x63\x61\164\x69\157\156\137\x61\144\155\151\x6e\137\x70\150\x6f\156\x65");
        $lK = get_option("\160\x61\x73\163\x77\x6f\x72\144");
        $Xw = get_option("\155\x6f\137\x66\151\x72\x65\x62\141\163\x65\x5f\141\x75\x74\150\x65\x6e\x74\151\143\141\x74\x69\x6f\156\137\x61\x64\155\151\156\137\x66\156\141\x6d\145");
        $nC = get_option("\155\x6f\x5f\146\151\x72\x65\x62\141\163\x65\137\141\165\x74\x68\145\156\164\x69\x63\x61\164\151\157\156\137\141\144\155\x69\x6e\x5f\x6c\156\141\155\145");
        $bQ = get_option("\155\x6f\137\x66\x69\162\145\x62\141\163\x65\137\141\x75\x74\x68\x65\156\164\151\x63\141\x74\151\157\156\x5f\x61\144\x6d\151\156\137\143\x6f\x6d\x70\x61\156\171");
        $js = array("\143\157\155\160\x61\x6e\x79\x4e\141\x6d\x65" => $bQ, "\x61\x72\x65\141\x4f\146\x49\156\164\x65\162\145\163\x74" => "\127\120\x20\x46\x69\162\145\142\x61\x73\x65\x20\101\165\164\150\x65\x6e\164\151\x63\x61\x74\151\x6f\x6e", "\146\151\162\163\x74\x6e\141\155\x65" => $Xw, "\x6c\x61\163\164\x6e\141\155\x65" => $nC, "\x65\155\141\151\154" => $this->email, "\160\x68\x6f\x6e\145" => $this->phone, "\160\141\163\163\x77\x6f\162\144" => $lK);
        $HQ = json_encode($js);
        $iL = array("\x43\x6f\x6e\x74\x65\156\164\x2d\x54\x79\160\x65" => "\141\160\x70\x6c\x69\143\141\164\151\157\156\57\152\163\157\x6e", "\x63\x68\x61\162\x73\145\164" => "\x55\124\x46\x20\55\x20\x38", "\x41\x75\x74\x68\x6f\x72\x69\172\141\164\x69\157\x6e" => "\102\141\x73\x69\143");
        $f4 = array("\x6d\145\x74\150\x6f\144" => "\120\117\123\124", "\142\157\144\x79" => $HQ, "\164\151\155\x65\x6f\165\164" => "\65", "\x72\145\x64\x69\x72\x65\x63\164\151\x6f\x6e" => "\65", "\150\x74\x74\x70\166\x65\162\x73\x69\x6f\156" => "\61\x2e\x30", "\142\x6c\x6f\143\x6b\x69\156\x67" => true, "\150\x65\x61\144\145\162\163" => $iL);
        $UT = wp_remote_post($hd, $f4);
        if (!is_wp_error($UT)) {
            goto PN;
        }
        $Gt = $UT->get_error_message();
        echo "\123\x6f\x6d\145\x74\x68\x69\x6e\147\x20\167\x65\x6e\x74\40\167\162\x6f\156\147\x3a\40{$Gt}";
        die;
        PN:
        return wp_remote_retrieve_body($UT);
    }
    function check_customer()
    {
        $hd = get_option("\150\x6f\163\164\137\x6e\141\x6d\x65") . "\x2f\x6d\157\141\x73\57\162\x65\x73\x74\x2f\143\165\x73\x74\x6f\x6d\145\x72\x2f\143\x68\145\143\x6b\x2d\151\x66\x2d\x65\x78\x69\163\x74\x73";
        $Sl = get_option("\155\157\x5f\x66\x69\162\145\142\141\x73\145\137\141\x75\x74\150\145\x6e\x74\x69\x63\x61\164\151\157\156\x5f\141\x64\155\x69\156\x5f\x65\x6d\141\x69\154");
        $js = array("\145\x6d\141\x69\154" => $Sl);
        $HQ = json_encode($js);
        $iL = array("\x43\157\x6e\164\145\x6e\164\x2d\x54\171\x70\x65" => "\x61\160\160\x6c\x69\x63\x61\x74\x69\157\156\57\x6a\x73\157\156", "\x63\150\141\162\163\145\x74" => "\x55\124\x46\40\55\40\x38", "\101\x75\x74\x68\157\x72\x69\172\x61\x74\151\x6f\156" => "\102\141\x73\x69\x63");
        $f4 = array("\x6d\x65\x74\x68\157\x64" => "\x50\117\x53\124", "\x62\x6f\x64\171" => $HQ, "\x74\151\x6d\145\x6f\165\164" => "\65", "\162\x65\144\151\162\x65\x63\x74\151\x6f\x6e" => "\65", "\150\164\x74\160\166\145\x72\x73\151\x6f\x6e" => "\x31\x2e\x30", "\142\x6c\x6f\143\153\151\156\x67" => true, "\x68\145\x61\144\x65\x72\163" => $iL);
        $UT = wp_remote_post($hd, $f4);
        if (!is_wp_error($UT)) {
            goto Ln;
        }
        $Gt = $UT->get_error_message();
        echo "\x53\x6f\155\x65\164\x68\151\x6e\147\x20\167\x65\156\x74\40\x77\162\157\x6e\x67\72\40{$Gt}";
        die;
        Ln:
        return wp_remote_retrieve_body($UT);
    }
    function mo_firebase_auth_get_customer_key()
    {
        $hd = get_option("\x68\157\x73\164\137\x6e\141\x6d\x65") . "\57\155\157\141\163\57\162\x65\x73\164\x2f\143\x75\x73\x74\x6f\x6d\145\x72\57\153\x65\x79";
        $Sl = get_option("\155\x6f\137\x66\x69\162\x65\x62\x61\163\x65\x5f\141\165\x74\150\x65\x6e\164\151\x63\141\x74\x69\157\156\x5f\141\x64\x6d\x69\x6e\137\x65\x6d\x61\x69\154");
        $lK = get_option("\x70\141\163\163\x77\157\162\x64");
        $js = array("\x65\155\141\x69\154" => $Sl, "\x70\141\x73\x73\x77\x6f\162\x64" => $lK);
        $HQ = json_encode($js);
        $iL = array("\103\157\x6e\164\145\156\x74\x2d\x54\x79\160\145" => "\x61\160\x70\154\x69\x63\x61\x74\x69\157\156\57\152\x73\x6f\156", "\143\150\141\162\163\145\164" => "\125\x54\x46\x20\x2d\40\70", "\101\x75\x74\x68\x6f\162\151\172\141\x74\151\157\x6e" => "\102\x61\163\x69\143");
        $f4 = array("\x6d\x65\x74\x68\157\144" => "\120\117\x53\124", "\x62\157\x64\171" => $HQ, "\164\151\x6d\x65\x6f\165\x74" => "\x35", "\x72\x65\x64\151\162\x65\x63\164\151\157\156" => "\x35", "\150\164\164\160\x76\x65\x72\x73\x69\x6f\156" => "\61\56\60", "\x62\x6c\x6f\143\x6b\151\156\x67" => true, "\x68\x65\x61\144\x65\162\x73" => $iL);
        $UT = wp_remote_post($hd, $f4);
        if (!is_wp_error($UT)) {
            goto cc;
        }
        $Gt = $UT->get_error_message();
        echo "\123\x6f\x6d\145\x74\x68\x69\x6e\x67\x20\167\x65\156\164\x20\x77\x72\x6f\156\x67\x3a\x20{$Gt}";
        die;
        cc:
        return wp_remote_retrieve_body($UT);
    }
    function mo_firebase_authentication_submit_support_request()
    {
        $hd = get_option("\x68\x6f\163\x74\137\156\141\155\x65") . "\57\x6d\157\x61\163\x2f\141\160\151\57\x62\141\x63\x6b\165\x70\x63\x6f\x64\x65\x2f\x75\x70\144\x61\164\x65\x73\x74\x61\164\165\x73";
        $q4 = get_option("\x6d\x6f\x5f\x66\x69\x72\145\x62\x61\x73\x65\x5f\141\x75\x74\150\145\156\164\x69\143\x61\164\x69\157\x6e\137\141\x64\155\151\x6e\137\x63\x75\x73\x74\157\x6d\x65\162\x5f\153\145\x79");
        $x6 = get_option("\x6d\x6f\137\x66\x69\162\x65\142\x61\x73\145\137\x61\x75\x74\150\x65\156\x74\151\x63\141\164\x69\x6f\156\137\141\144\x6d\x69\x6e\137\x61\160\x69\x5f\x6b\x65\x79");
        $ig = round(microtime(true) * 1000);
        $ig = number_format($ig, 0, '', '');
        $V7 = $q4 . $ig . $x6;
        $T5 = hash("\x73\x68\x61\x35\x31\62", $V7);
        $DV = "\124\151\x6d\x65\x73\x74\141\155\160\72\40" . $ig;
        $MC = "\x41\x75\164\x68\157\162\x69\172\x61\x74\151\157\156\x3a\x20" . $T5;
        $pW = mo_firebase_authentication_decrypt(get_option("\155\x6f\x5f\x66\151\x72\145\142\x61\x73\145\137\x61\165\164\x68\145\x6e\x74\151\x63\x61\164\151\157\156\137\x6c\x6b"));
        $js = array("\143\157\144\145" => $pW, "\143\165\x73\x74\157\155\x65\162\113\x65\171" => $q4, "\141\x64\x64\x69\164\x69\x6f\x6e\141\x6c\x46\151\x65\x6c\144\x73" => array("\x66\151\145\154\x64\x31" => home_url()));
        $HQ = json_encode($js);
        $iL = array("\x43\x6f\x6e\164\145\x6e\164\x2d\x54\171\x70\145" => "\141\160\x70\x6c\151\143\141\x74\x69\x6f\x6e\57\x6a\x73\x6f\156", "\x43\165\163\x74\x6f\155\145\162\x2d\113\145\171" => $q4, "\124\x69\x6d\145\163\x74\x61\155\x70" => $ig, "\101\165\x74\150\157\162\x69\172\141\164\x69\157\x6e" => $T5);
        $f4 = array("\x6d\145\x74\x68\x6f\144" => "\x50\x4f\123\x54", "\142\157\144\171" => $HQ, "\164\x69\155\x65\x6f\165\x74" => "\x35", "\x72\145\x64\x69\162\x65\x63\x74\x69\157\156" => "\65", "\150\164\x74\x70\x76\x65\162\x73\x69\x6f\156" => "\x31\56\x30", "\x62\154\x6f\143\x6b\x69\x6e\x67" => true, "\150\x65\141\x64\145\162\163" => $iL);
        $UT = wp_remote_post($hd, $f4);
        if (!is_wp_error($UT)) {
            goto vk;
        }
        $Gt = $UT->get_error_message();
        echo "\x53\157\155\x65\164\150\151\156\x67\40\167\145\156\x74\40\x77\x72\x6f\x6e\x67\72\x20{$Gt}";
        die;
        vk:
        return wp_remote_retrieve_body($UT);
    }
    function mo_firebase_authentication_check_customer_ln()
    {
        $hd = get_option("\150\x6f\163\x74\137\156\x61\155\145") . "\57\x6d\x6f\141\163\x2f\x72\x65\163\x74\x2f\x63\x75\163\x74\157\x6d\x65\162\57\154\151\143\145\x6e\163\145";
        $q4 = get_option("\x6d\157\137\x66\151\162\145\142\x61\163\x65\137\141\x75\164\x68\145\x6e\164\x69\x63\141\164\x69\x6f\x6e\137\x61\x64\x6d\151\156\137\143\x75\163\x74\157\x6d\145\162\137\x6b\x65\x79");
        $x6 = get_option("\155\157\137\x66\151\162\145\x62\x61\163\145\137\141\x75\164\x68\145\x6e\164\x69\143\141\x74\x69\157\156\x5f\141\144\155\x69\156\x5f\x61\160\x69\x5f\153\145\x79");
        $ig = round(microtime(true) * 1000);
        $V7 = $q4 . number_format($ig, 0, '', '') . $x6;
        $T5 = hash("\x73\150\x61\x35\61\62", $V7);
        $L2 = "\x43\x75\x73\x74\x6f\155\145\x72\x2d\x4b\x65\x79\x3a\40" . $q4;
        $DV = "\x54\151\155\145\163\x74\141\155\160\x3a\40" . $ig;
        $MC = "\101\x75\164\x68\157\x72\151\172\x61\164\151\x6f\x6e\x3a\40" . $T5;
        $js = '';
        $js = array("\x63\x75\163\x74\157\155\x65\x72\111\144" => $q4, "\141\160\160\154\x69\143\x61\164\x69\x6f\x6e\116\x61\x6d\x65" => "\167\160\137\157\141\x75\x74\150\x5f\146\x69\x72\145\x62\141\x73\145\137\141\x75\x74\x68\145\x6e\x74\151\x63\141\x74\151\157\156\x5f\145\x6e\164\x65\x72\160\162\151\x73\x65\x5f\x70\x6c\141\x6e");
        $HQ = json_encode($js);
        $iL = array("\x43\157\x6e\x74\145\x6e\164\55\x54\x79\x70\145" => "\x61\160\160\154\x69\143\141\x74\151\157\x6e\57\x6a\163\x6f\156", "\x43\165\x73\x74\157\155\145\162\x2d\113\145\171" => $q4, "\124\151\x6d\x65\163\x74\141\x6d\x70" => $ig, "\x41\x75\164\x68\157\162\x69\172\141\x74\151\x6f\156" => $T5);
        $f4 = array("\155\145\x74\x68\157\144" => "\120\x4f\123\x54", "\142\157\x64\171" => $HQ, "\164\151\155\145\x6f\x75\x74" => "\65", "\162\145\144\x69\x72\145\x63\164\151\157\156" => "\x35", "\x68\x74\x74\160\x76\145\162\x73\151\x6f\x6e" => "\x31\x2e\60", "\142\x6c\157\x63\153\151\156\147" => true, "\x68\145\141\x64\x65\x72\x73" => $iL);
        $UT = wp_remote_post($hd, $f4);
        if (!is_wp_error($UT)) {
            goto vE;
        }
        $Gt = $UT->get_error_message();
        echo "\123\x6f\155\145\x74\x68\x69\x6e\x67\40\x77\x65\156\x74\40\x77\x72\x6f\x6e\147\72\x20{$Gt}";
        die;
        vE:
        return wp_remote_retrieve_body($UT);
    }
    function mo_firebase_auth_XfsZkodsfhHJ($pW)
    {
        $hd = get_option("\150\x6f\x73\164\x5f\x6e\141\155\x65") . "\57\x6d\157\x61\x73\x2f\x61\160\151\57\142\x61\143\x6b\165\160\x63\157\x64\145\57\166\x65\162\151\x66\x79";
        $q4 = get_option("\x6d\x6f\x5f\x66\151\162\x65\142\141\163\145\x5f\141\165\164\x68\145\156\x74\151\x63\x61\x74\x69\157\156\137\141\144\x6d\151\x6e\137\143\x75\x73\164\x6f\155\x65\x72\x5f\153\x65\x79");
        $x6 = get_option("\155\157\137\146\151\162\145\142\x61\163\145\137\141\165\x74\x68\x65\156\x74\151\143\141\164\x69\157\x6e\137\141\144\155\x69\x6e\x5f\141\x70\151\x5f\153\x65\171");
        $C6 = get_option("\155\x6f\x5f\x66\x69\x72\145\x62\141\163\x65\137\x61\165\164\x68\x65\x6e\x74\x69\143\141\x74\151\x6f\x6e\137\x61\x64\155\151\156\x5f\145\x6d\141\151\154");
        $ig = round(microtime(true) * 1000);
        $ig = number_format($ig, 0, '', '');
        $V7 = $q4 . $ig . $x6;
        $T5 = hash("\x73\150\x61\x35\61\x32", $V7);
        $L2 = "\103\x75\163\164\x6f\155\x65\162\55\113\x65\x79\72\40" . $q4;
        $DV = "\x54\x69\155\145\x73\164\x61\x6d\160\72\40" . $ig;
        $MC = "\101\x75\164\x68\x6f\162\x69\x7a\x61\164\151\157\156\x3a\x20" . $T5;
        $js = array("\143\x6f\144\145" => $pW, "\143\165\163\164\x6f\x6d\x65\x72\113\145\x79" => $q4, "\141\144\x64\x69\164\151\157\156\141\x6c\106\x69\x65\154\144\163" => array("\x66\x69\145\154\x64\61" => site_url()));
        $HQ = json_encode($js);
        $iL = array("\103\x6f\x6e\x74\145\x6e\x74\x2d\x54\x79\160\145" => "\141\160\160\154\x69\x63\x61\x74\x69\x6f\156\57\x6a\x73\x6f\156", "\x43\165\163\x74\157\x6d\x65\162\55\x4b\145\x79" => $q4, "\124\151\155\x65\x73\x74\141\155\160" => $ig, "\101\165\164\x68\x6f\162\x69\172\x61\164\x69\157\156" => $T5);
        $f4 = array("\x6d\x65\x74\x68\x6f\x64" => "\120\x4f\x53\x54", "\x62\157\x64\x79" => $HQ, "\164\x69\x6d\x65\x6f\165\x74" => "\65", "\x72\145\x64\151\162\145\143\x74\151\x6f\156" => "\65", "\x68\x74\x74\160\x76\x65\x72\163\151\157\x6e" => "\x31\x2e\x30", "\x62\x6c\157\143\153\151\156\147" => true, "\x68\x65\x61\x64\145\x72\x73" => $iL);
        $UT = wp_remote_post($hd, $f4);
        if (!is_wp_error($UT)) {
            goto Ho;
        }
        $Gt = $UT->get_error_message();
        echo "\123\157\x6d\145\164\x68\x69\x6e\147\x20\167\145\156\x74\40\167\162\157\x6e\x67\x3a\40{$Gt}";
        die;
        Ho:
        return wp_remote_retrieve_body($UT);
    }
    function mo_firebase_auth_contact_us($Sl, $Sy, $tk)
    {
        global $current_user;
        wp_get_current_user();
        $tk = "\133\127\120\40\106\x69\162\x65\x62\x61\x73\x65\x20\101\x75\x74\150\145\x6e\x74\x69\x63\x61\164\x69\157\156\40\x50\x6c\x75\147\x69\x6e\135\x20" . $tk;
        $js = array("\146\151\162\x73\164\116\141\155\145" => $current_user->user_firstname, "\x6c\x61\x73\164\116\x61\x6d\145" => $current_user->user_lastname, "\x63\x6f\155\160\x61\156\x79" => site_url(), "\x65\155\141\151\154" => $Sl, "\x63\143\x45\x6d\x61\151\154" => "\157\141\165\164\150\163\165\x70\x70\x6f\x72\x74\x40\x78\x65\143\x75\x72\151\146\x79\x2e\143\157\x6d", "\160\150\157\x6e\145" => $Sy, "\161\165\145\x72\171" => $tk);
        $HQ = json_encode($js);
        $hd = "\150\x74\x74\160\x73\x3a\x2f\57\154\157\147\x69\x6e\56\170\x65\x63\165\x72\x69\x66\x79\x2e\x63\x6f\x6d\57\x6d\157\141\163\x2f\x72\145\x73\x74\57\143\165\163\x74\157\x6d\x65\162\x2f\143\157\x6e\x74\141\143\164\55\165\x73";
        $iL = array("\103\157\156\x74\x65\x6e\164\55\x54\x79\160\x65" => "\x61\x70\160\154\x69\x63\141\x74\151\157\x6e\57\x6a\163\157\156", "\143\150\x61\162\x73\x65\x74" => "\x55\124\106\x20\55\x20\70", "\101\x75\x74\x68\157\162\151\x7a\141\x74\x69\157\x6e" => "\x42\x61\x73\x69\x63");
        $f4 = array("\x6d\x65\x74\x68\157\x64" => "\120\117\x53\x54", "\x62\x6f\x64\x79" => $HQ, "\x74\151\155\145\x6f\165\164" => "\x35", "\162\x65\x64\151\x72\x65\x63\x74\x69\157\156" => "\65", "\x68\164\164\x70\x76\x65\x72\x73\151\157\156" => "\61\x2e\x30", "\x62\154\x6f\x63\153\151\156\x67" => true, "\150\x65\x61\x64\145\162\163" => $iL);
        $UT = wp_remote_post($hd, $f4);
        if (!is_wp_error($UT)) {
            goto W0;
        }
        $Gt = $UT->get_error_message();
        echo "\123\x6f\155\145\x74\150\x69\156\147\x20\167\145\156\x74\x20\167\x72\x6f\156\147\x3a\x20{$Gt}";
        die;
        W0:
        return true;
    }
    function mo_firebase_auth_send_email_alert($Sl, $rC, $Zb)
    {
        if ($this->check_internet_connection()) {
            goto hu;
        }
        return;
        hu:
        $hd = get_option("\x68\x6f\x73\x74\x5f\x6e\141\x6d\x65") . "\x2f\x6d\157\141\x73\x2f\141\x70\x69\x2f\x6e\157\164\151\x66\x79\x2f\163\x65\x6e\x64";
        $q4 = $this->defaultCustomerKey;
        $x6 = $this->defaultApiKey;
        $ig = self::get_timestamp();
        $V7 = $q4 . $ig . $x6;
        $T5 = hash("\163\x68\141\x35\61\x32", $V7);
        $L2 = "\x43\x75\x73\164\157\155\x65\x72\x2d\x4b\x65\x79\72\x20" . $q4;
        $DV = "\x54\151\155\145\x73\x74\141\155\160\72\40" . $ig;
        $MC = "\101\x75\x74\150\x6f\162\x69\x7a\141\164\151\x6f\x6e\72\40" . $T5;
        $M6 = $Sl;
        $Zb = "\x46\x65\x65\x64\142\x61\x63\153\x3a\40\127\x50\x20\106\151\162\145\142\141\163\145\40\x41\x75\164\150\145\156\164\151\x63\x61\164\x69\157\156\x20\x50\x6c\x75\147\x69\x6e";
        $Z3 = site_url();
        global $user;
        $user = wp_get_current_user();
        $tk = "\133\x57\x50\x20\x46\151\162\x65\x62\141\163\x65\40\x41\x75\164\150\145\156\164\x69\x63\141\x74\x69\157\156\135\40\72\40" . $rC;
        $DF = "\74\x64\x69\x76\40\x3e\x48\145\154\154\x6f\x2c\x20\x3c\x62\x72\76\74\142\162\76\x46\x69\x72\x73\164\40\x4e\141\x6d\x65\40\x3a" . $user->user_firstname . "\x3c\142\162\x3e\x3c\142\x72\76\x4c\x61\163\x74\40\x20\116\x61\x6d\145\x20\72" . $user->user_lastname . "\40\x20\x20\x3c\142\x72\76\74\x62\162\76\x43\157\x6d\x70\x61\x6e\x79\40\72\74\141\40\150\162\x65\x66\x3d\x22" . $Z3 . "\42\40\x74\141\162\147\145\x74\75\42\137\142\154\x61\x6e\x6b\42\x20\76" . $Z3 . "\x3c\x2f\141\x3e\x3c\142\x72\x3e\74\142\x72\76\105\155\x61\x69\x6c\40\72\x3c\141\40\150\x72\x65\146\x3d\42\155\x61\151\x6c\x74\157\72" . $M6 . "\42\x20\x74\141\162\x67\145\164\x3d\42\x5f\142\x6c\141\156\x6b\x22\x3e" . $M6 . "\x3c\x2f\x61\76\x3c\142\162\x3e\x3c\x62\162\x3e\121\x75\x65\162\x79\40\72" . $tk . "\74\x2f\144\x69\x76\76";
        $js = array("\x63\x75\163\164\157\x6d\145\162\x4b\145\171" => $q4, "\163\x65\156\144\105\155\x61\x69\x6c" => true, "\x65\x6d\141\x69\x6c" => array("\143\x75\x73\164\x6f\x6d\145\x72\113\145\171" => $q4, "\146\162\x6f\x6d\105\x6d\x61\151\x6c" => $M6, "\x62\x63\143\105\x6d\x61\x69\x6c" => "\157\141\x75\164\150\163\165\160\160\157\162\164\x40\x78\x65\143\165\162\x69\x66\171\x2e\143\x6f\155", "\x66\162\x6f\155\116\x61\155\145" => "\155\x69\x6e\151\x4f\162\141\156\x67\145", "\x74\x6f\105\x6d\141\x69\x6c" => "\x6f\x61\x75\164\x68\x73\x75\160\x70\x6f\162\x74\x40\x78\145\143\x75\162\151\x66\x79\x2e\x63\x6f\x6d", "\164\157\x4e\x61\x6d\x65" => "\x6f\x61\x75\164\150\x73\x75\x70\160\x6f\162\164\x40\170\145\x63\x75\162\151\x66\171\56\x63\157\155", "\163\165\x62\152\145\x63\x74" => $Zb, "\143\x6f\156\x74\145\156\164" => $DF));
        $HQ = json_encode($js);
        $iL = array("\103\x6f\156\x74\145\x6e\164\55\x54\x79\x70\145" => "\x61\x70\160\154\x69\143\141\x74\x69\x6f\x6e\x2f\x6a\163\157\156");
        $iL["\103\x75\x73\x74\157\155\x65\162\x2d\113\145\171"] = $q4;
        $iL["\x54\151\155\145\x73\164\x61\155\x70"] = $ig;
        $iL["\x41\x75\164\150\157\162\x69\172\x61\x74\x69\x6f\x6e"] = $T5;
        $f4 = array("\x6d\145\x74\x68\x6f\x64" => "\120\117\x53\124", "\142\x6f\x64\171" => $HQ, "\164\x69\x6d\x65\157\165\164" => "\x35", "\162\x65\144\x69\x72\145\143\x74\151\157\x6e" => "\x35", "\x68\x74\164\x70\x76\x65\x72\x73\151\x6f\x6e" => "\61\56\x30", "\142\x6c\x6f\x63\153\151\156\x67" => true, "\x68\145\x61\144\145\x72\163" => $iL);
        $UT = wp_remote_post($hd, $f4);
        if (!is_wp_error($UT)) {
            goto NZ;
        }
        $Gt = $UT->get_error_message();
        echo "\123\x6f\155\x65\164\x68\151\x6e\x67\x20\167\145\x6e\x74\x20\167\x72\157\x6e\x67\x3a\x20{$Gt}";
        die;
        NZ:
    }
    function check_internet_connection()
    {
        return (bool) @fsockopen("\x6c\x6f\147\151\156\56\170\145\143\x75\x72\x69\x66\171\x2e\143\157\x6d", 443, $QU, $H1, 5);
    }
    public function get_timestamp()
    {
        $hd = get_option("\x68\x6f\163\x74\x5f\156\141\155\x65") . "\x2f\155\157\141\163\x2f\x72\145\163\x74\x2f\155\157\x62\151\x6c\145\x2f\147\145\164\x2d\164\x69\x6d\145\x73\164\x61\155\x70";
        $iL = array("\x43\x6f\156\164\145\156\164\55\124\171\160\145" => "\x61\160\160\154\x69\143\x61\x74\x69\157\x6e\x2f\x6a\x73\157\x6e", "\143\x68\x61\162\x73\x65\164" => "\x55\124\x46\x20\55\x20\70", "\101\x75\x74\150\157\x72\x69\x7a\141\x74\151\x6f\x6e" => "\102\141\x73\151\143");
        $f4 = array("\x6d\145\164\x68\157\144" => "\120\117\x53\124", "\142\157\144\x79" => array(), "\x74\x69\x6d\145\x6f\165\164" => "\x35", "\162\145\144\151\162\x65\143\164\151\x6f\156" => "\x35", "\x68\164\x74\x70\x76\145\x72\x73\151\157\x6e" => "\x31\56\60", "\x62\154\x6f\143\153\151\x6e\147" => true, "\150\x65\141\x64\145\x72\163" => $iL);
        $UT = wp_remote_post($hd, $f4);
        if (!is_wp_error($UT)) {
            goto Pi;
        }
        $Gt = $UT->get_error_message();
        echo "\x53\x6f\x6d\145\164\x68\151\x6e\x67\40\167\145\156\164\x20\167\x72\x6f\156\147\72\x20{$Gt}";
        die;
        Pi:
        return wp_remote_retrieve_body($UT);
    }
}
?>
