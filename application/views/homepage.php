<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>


</head>

<body>

    <!-- to make sure back-end success. make this as simple as possible, css and js not yet added -->

    <div id="container">
        <h1>Homepage</h1>

        <!-- navbar -->
        <nav>
            <a href="<?= base_url() ?>">Home</a> |
            <a href="<?= base_url('products') ?>">Products</a> |
            <a href="<?= base_url('cart') ?>">Cart</a> |
            <a href="<?= base_url('login') ?>">
                <?= isset($user) ? $user['name'] : 'Login' ?>
            </a>
        </nav>


        <h2>Products</h2>
        <ul>
            <?php foreach ($products as $product): ?>
                <li>
                    <a href="<?= base_url('product/' . $product['link_name']) ?>"><strong><?= $product['name'] ?></strong></a><br></a>
                    Description: <?= $product['description'] ?>

                    <?php foreach ($product['variants'] as $variant): ?>
                        <br><?= $variant['name'] ?> - Price: $<?= $variant['price'] ?>
                    <?php endforeach; ?>

                    <br><br>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

</body>

</html>