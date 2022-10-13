<?php /* ?><?php
$languages = $_SESSION['languages'];
for ($i = 0; $i < count($languages); $i++) {
    if (!empty($post_languages)) {
        for ($a = 0; $a < count($post_languages); $a++) {
            if (!empty($post_languages[$a]->lang_id) && $languages[$i]->lang_id == $post_languages[$a]->lang_id) {
                $languages[$i]->post_lang_id = $post_languages[$a]->lang_id;
            }
        }
    }else{
        $languages[$i]->post_lang_id=0;
    }
}
?>
<div class="form-actions languagepanel">
    <?php foreach ($languages as $language): ?>
        <div class="span2">
             <input type="checkbox" class="ace-checkbox-2" id="language-<?php echo $language->lang_id; ?>" name="languages[]" value="<?php echo $language->lang_id; ?>" <?php if(!empty($language->post_lang_id) && $language->lang_id==$language->post_lang_id){ echo 'checked'; }elseif($language->lang_id==$_SESSION['login_status']['lang_id']) echo 'checked'; ?>>
            <label class="lbl" for="language-<?php echo $language->lang_id; ?>"> <?php echo $language->lang_name; ?></label>
        </div>
    <?php endforeach; ?> 
</div>

<?php /*<?php $languages = $_SESSION['languages']; ?>
<div class="form-actions languagepanel">
    <?php foreach ($languages as $language): ?>
        <div class="span2">
            <input type="checkbox" class="ace-checkbox-2" id="language-<?php echo $language->lang_id; ?>" name="languages[]" value="<?php echo $language->lang_id; ?>" <?php echo ($language->lang_id==$_SESSION['login_status']['lang_id']) ? 'checked' : ''; ?>>
            <label class="lbl" for="language-<?php echo $language->lang_id; ?>"> <?php echo $language->lang_name; ?></label>
        </div>
    <?php endforeach ?> 
</div>
<?php*/?>
<?php $languages = $_SESSION['languages']; ?>
<div class="form-actions languagepanel">
    <div>
    <?php foreach ($languages as $language): ?>
        <div class="checkbox">
            <label class="lbl" for="language-<?php echo $language->lang_id; ?>"> <?php /* <input type="checkbox" class="ace-checkbox-2" id="language-<?php echo $language->lang_id; ?>" name="languages[]" value="<?php echo $language->lang_id; ?>" <?php echo (!empty($language->post_lang_id) && $language->lang_id == $language->post_lang_id) ? 'checked' : ''; ?>> */ ?>
            <input type="checkbox" class="ace-checkbox-2" id="language-<?php echo $language->lang_id; ?>" name="languages[]" value="<?php echo $language->lang_id; ?>" <?php echo ($language->lang_id == $this->session->userdata('lang_id')) ? 'checked' : ''; ?>>
            <?php /* <input type="checkbox" class="ace-checkbox-2" id="language-<?php echo $language->lang_id; ?>" name="languages[]" value="<?php echo $language->lang_id; ?>" <?php if(!empty($language->post_lang_id) && $language->lang_id==$language->post_lang_id){ echo 'checked'; }elseif($language->lang_id==$this->session->userdata('lang_id')) echo 'checked'; ?>> */ ?>
            <?php echo $language->lang_name; ?></label>
        </div>
    <?php endforeach; ?> 
        </div>
</div>
<?php
for ($i = 0; $i < count($languages); $i++) {
    if (!empty($post_languages)) {
        for ($a = 0; $a < count($post_languages); $a++) {
            if (!empty($post_languages[$a]->lang_id) && $languages[$i]->lang_id == $post_languages[$a]->lang_id) {
                $languages[$i]->post_lang_id = $post_languages[$a]->lang_id;
            }
        }
    }else{
        $languages[$i]->post_lang_id=0;
    }
}
//echo "<pre/>"; print_r($languages); die;
?>
<div class="form-actions languagepanel" style='padding: 12px 20px 6px; margin-top: 5px;    padding-left: 180px; display: none;'>
    <?php foreach ($languages as $language): ?>
        <div class="span2">
            <?php if(!empty($language->post_lang_id) && $language->lang_id==$language->post_lang_id){ echo '<i class="icon-check" style="float: left; padding: 4px 2px 0px 0px;"></i>'; }elseif($language->lang_id==$this->session->userdata('lang_id')){ echo '<i class="icon-check" style="float: left; padding: 4px 2px 0px 0px;"></i>'; }else{ echo '<i class="icon-check-empty"  style="float: left; padding: 4px 2px 0px 0px;"></i>'; } ?>
            <label class="lbl"> <?php echo $language->lang_name; ?></label>
        </div>
    <?php endforeach; ?> 
</div>
