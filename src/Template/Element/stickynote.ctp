<tr>
	<td><input type="text" id="title-<?= $index ?>" value=<?= $title ?> /></td>
	
	<td><input type="text" id="description-<?= $index ?>" value="<?= $this->Text->truncate($description,40,['ellipsis' => '...','exact' => false]); ?>" /></td>
	<td><input type="text" id="url-<?= $index ?>" value=<?= $url ?> /> <a href="<?=$url ?>">click me</a></td>
	
</tr>
