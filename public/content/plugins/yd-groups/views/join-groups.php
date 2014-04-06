<h2>我参加的组</h2>

<table>
	<thead>
		<tr>
			<th width="200">组名</th>
			<th>描述</th>
		</tr>
	</thead>
	<tbody>
		<?php for ($i=0; $i < count($results); $i++): ?>
			<tr>
				<td>
					<a href="/groups/<?php echo $results[$i]->group_id; ?>/show">
						<?php echo $results[$i]->name ?>
					</a>
				</td>
				<td><?php echo $results[$i]->description ?></td>
			</tr>
		<?php endfor; ?>
	</tbody>
</table>