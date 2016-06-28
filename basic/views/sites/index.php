
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<table class="table">
    <tr>
        <th>site_id</th>
        <th>site_name</th>
        <th>site_type</th>
        <th>site_galleryful</th>
        <th>site_facilities</th>
    </tr>
    <?php foreach($sites as $item) { ?>
    <tr>
        <td><?php echo $item['site_id'] ?></td>
        <td><?php echo $item['site_name'] ?></td>
        <td><?php echo $item['site_type'] ?></td>
        <td><?php echo $item['site_galleryful'] ?></td>
        <td><?php echo $item['site_facilities'] ?></td>
    </tr>
    <?php } ?>
</table>