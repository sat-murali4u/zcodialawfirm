
<select class="form-control ddSubMenu" style="width: 100%;" onchange="get_submenuDetails($(this))">
    <option selected="selected" value="0">Please Select...</option>
    <?php
    if (isset($menu) && !empty($menu)) {
        foreach ($menu as $key_smenu => $value_submenu) {
           
            ?>
            <option value="<?php echo $value_submenu['menu_id']; ?>" url="<?php echo $value_submenu['url']; ?>"><?php echo $value_submenu['menu_text'] ?></option>
        <?php
        }
    }
    ?>
</select>
