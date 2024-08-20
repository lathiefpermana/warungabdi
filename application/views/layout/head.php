<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="Warung Abdi" name="description" />
    <meta content="alathiefpermana@gmail.com" name="author" />
    <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/images/logos/favicon.png'); ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css'); ?>" />    
    <link rel="stylesheet" href="<?= base_url('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/libs/select2/dist/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/libs/jquery-ui-1.14.0/jquery-ui.css'); ?>">
    
    <title>Warung Abdi</title>
    <style>
        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: .5s ease;
            background-color: grey;
            }

            .container:hover .overlay {
            opacity: 0.8;
            }

            .text {
            color: white;
            font-size: 36px;
            position: absolute;
            top: 50%;
            left: 60%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
            }

            .select2-selection__arrow b{
                display:none !important;
            }
    </style>
</head>