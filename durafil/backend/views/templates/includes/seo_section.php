<?php
//====================
//SEO CODE BEGINS HERE
//==========================
?>
<h4 class="panel-title" style="padding: 10px; margin-bottom: 11px; background-color: #ccc; border-bottom: 1px solid rgba(0,0,0,.125);"><?php echo SEO_SECTION ?></h4>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <label for="role_id">Meta Title</label>
        <div class="form-group">
            <input class="form-control" name="meta_title" type="text" placeholder="Meta Title" value="<?php echo (!empty($query->meta_title)) ? $query->meta_title : ''; ?>"  />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <label for="role_id">Meta Description</label>
        <div class="form-group">
            <textarea class='form-control' rows="3" name="meta_description" placeholder="Meta Description" ><?php echo (!empty($query->meta_description)) ? $query->meta_description : ''; ?></textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <label for="role_id">Meta Keywords</label>
        <div class="form-group">
            <?php echo form_error('meta_keywords'); ?>
            <input class="form-control" name="meta_keywords" type="text" placeholder="Meta Keywords" value="<?php echo (!empty($query->meta_keywords)) ? $query->meta_keywords : ''; ?>"  />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <label for="role_id">Other Meta Tags</label>
        <div class="form-group">
            <?php echo form_error('other_meta_tags'); ?>
            <textarea class='form-control' rows="3" name="other_meta_tags" placeholder="Other Meta Tags" ><?php echo (!empty($query->other_meta_tags)) ? $query->other_meta_tags : ''; ?></textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <label for="nofollow_ind">No Follow Tag</label>
        <div class="form-group">
            <?php echo form_error('nofollow_ind'); ?>
            <label><input name="nofollow_ind" value="1" type="radio" <?php echo (!empty($query->nofollow_ind)) ? 'checked' : ''; ?> />
            <span class="lbl">Yes</span></label>
            &nbsp; &nbsp; &nbsp;&nbsp;
            <label><input name="nofollow_ind" value="0" type="radio" <?php echo (empty($query->nofollow_ind)) ? 'checked' : ''; ?> />
            <span class="lbl">No</span></label>
        </div>
    </div>

    <div class="col-xs-4 col-sm-4 col-md-4">
        <label for="noindex_ind">No Index Tag</label>
        <div class="form-group">
            <?php echo form_error('noindex_ind'); ?>
            <label><input name="noindex_ind" value="1" type="radio" <?php echo (!empty($query->noindex_ind)) ? 'checked' : ''; ?> />
            <span class="lbl">Yes</span></label>
            &nbsp; &nbsp; &nbsp;&nbsp;
            <label><input name="noindex_ind" value="0" type="radio" <?php echo (empty($query->noindex_ind)) ? 'checked' : ''; ?> />
            <span class="lbl">No</span></label>
        </div>
    </div>
</div>
<br>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <label for="company" class=" form-control-label">Front End Display Status</label><br>
                <label><input name="status_ind" value="1" type="radio" <?php echo (!empty($query->status_ind) && $query->status_ind == 1) ? 'checked' : ''; ?> />
                    <span class="lbl">Active</span></label>
                &nbsp; &nbsp; &nbsp;&nbsp;
                <label><input name="status_ind" value="0" type="radio" <?php echo (empty($query->status_ind)) ? 'checked' : ''; ?> />
                    <span class="lbl">In Active</span></label> &nbsp; &nbsp; &nbsp;&nbsp;
            </div>
        </div>
    </div>
<?php
//====================
//SEO CODE END HERE
//==========================
?>