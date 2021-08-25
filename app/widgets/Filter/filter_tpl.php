<?php foreach ($this->groups as $group_id => $group_item):?>
    <div class="categories">
        <p><?php echo $group_item;?></p>
        <ul class="row1">
            <?php foreach ($this->attrs[$group_id] as $attrs_id => $value):?>
                <?php if (!empty($filter) && in_array($attrs_id, $filter)) {
                    $checked = ' checked';
                  } else {
                    $checked = null;
                }
                ?>
                <li class="checkbox">
                    <input type="checkbox" name="checkbox" value="<?php echo $attrs_id;?>" <?php echo $checked;?>><?php echo $value;?>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endforeach;?>
