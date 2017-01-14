<li style="background-color:<?= GenerateRandomColor() ?>;">
<h4><?= $this->Text->truncate($title,20,['ellipsis' => '...','exact' => false]) ?></h4>
<p><?= $this->Text->truncate($description,40,['ellipsis' => '...','exact' => false]) ?></p>
<a href="<?= $url ?>" title="<?= $url ?>"></a>
</p>
</li>
