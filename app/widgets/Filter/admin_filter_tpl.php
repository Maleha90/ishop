<div class="nav-tabs-custom" id="filter">
    <ul class="nav nav-pills ml-auto p-2">
        <?php $i = 1; foreach($this->groups as $group_id => $group_item): ?>
            <li<?php if($i == 1) echo ' class="nav-item active"' ?>><a href="#tab_<?php echo $group_id ?>" class="nav-link" data-toggle="tab" aria-expanded="true"><?php echo $group_item ?></a></li>
            <?php $i++; endforeach; ?>
        <li class="pull-right">
            <a href="#" id="reset-filter" class="btn btn-danger">Сброс</a>
        </li>
    </ul>
    <div class="tab-content">
        <?php if(!empty($this->attrs[$group_id])): ?>
            <?php $i = 1; foreach($this->groups as $group_id => $group_item): ?>
                <div class="tab-pane<?php if($i == 1) echo ' active' ?>" id="tab_<?php echo $group_id ?>">
                    <?php foreach($this->attrs[$group_id] as $attr_id => $value): ?>
                        <?php
                        if(!empty($this->filter) && in_array($attr_id, $this->filter)){
                            $checked = ' checked';
                        }else{
                            $checked = null;
                        }
                        ?>
                        <div class="form-group">
                            <label>
                                <input type="radio" name="attrs[<?php echo $group_id ?>]" value="<?php echo $attr_id ?>"<?php echo $checked ?>> <?php echo $value ?>
                            </label>
                        </div>
                        <?php $i++; endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
