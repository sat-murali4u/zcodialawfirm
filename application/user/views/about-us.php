<?php

$auHeaderTitle = $auDesc = $auSideImage = '';
if (isset($aboutus) && !empty($aboutus)) {
    $auHeaderTitle = $aboutus[0]['au_header_title'];
    $auDesc = $aboutus[0]['au_content'];
    $auSideImage = $aboutus[0]['au_side_image'];
}
?>

<?php include APPPATH . 'views/about_part/about_part1.php'; ?>
<?php include APPPATH . 'views/team_part/team_part1.php'; ?>