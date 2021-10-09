<?php

/**
 * Snipcart Cart
 */

?>

<div hidden id="snipcart" data-api-key="ZjQ1YTFjOWYtNzU1Yy00OWZlLWIxMzMtMzc2YWEzM2UwZTRjNjM3NjkzNjA4NzkwNzk3NDg1" data-config-add-product-behavior="none">
    <component-to-override section="top">
        <div class="root">
            This will be inserted into the section named `top`.
        </div>
    </component-to-override>

    <item-line>
        <li class="snipcart__item__line snipcart__box">
            <div class="snipcart__item__line__product">
                <div class="snipcart__item__line__header">
                    <h2 class="snipcart__item__line__header__title">
                        {{ item.name }}
                        <div>test</div>
                    </h2>

                    <item-quantity class="snipcart__item__line__quantity" v-if="!adding"></item-quantity>
                    <div class="snipcart__item__line__header__actions">
                        <remove-item-action class="snipcart__button--icon">

                            <icon name="trash" class="icon--red" alt="item.remove_item"></icon>
                        </remove-item-action>
                    </div>
                </div>
            </div>
        </li>
    </item-line>
</div>