
<select class="form-control ddMainMenu" style="width: 100%;" onchange="get_menuDetails($(this))">
    <option selected="selected" value="0">Please Select...</option>
    <?php
    if (isset($menu) && !empty($menu)) {
        foreach ($menu as $key_menu => $value_menu) {
           
            ?>
            <option value="<?php echo $value_menu['menu_id']; ?>" url="<?php echo $value_menu['url']; ?>"><?php echo $value_menu['menu_text']; ?></option>
        <?php
        }
    }
    ?>
</select>
