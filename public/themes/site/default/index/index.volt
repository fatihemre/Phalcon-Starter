<style>
	body{font-family:arial, sans-serif;font-size:14px}
	table{width:800px;border-collapse:collapse}
	table th, table td{padding:10px;border:1px solid #e5e5e5}
	table th{background:#3883AB;color:#fff}
</style>
{% if users %}
    <table>
    	<tr>
    		<th>Name</th>
    		<th>Email</th>
    		<th>Role</th>
    		<th>Created At</th>
    		<th>Updated At</th>
    	</tr>
    {% for user in users %}
    	<tr>
    		<td>{{ user['name'] }}</td>
    		<td>{{ user['email'] }}</td>
    		<td>{{ user['role'] }}</td>
    		<td>{{ user['created_at'] }}</td>
    		<td>{{ user['updated_at'] }}</td>
    	</tr>
    {% endfor %}
    </table>
{% else %}
    <strong><span style="color:red">Kullanıcı bulunamadı.</span></strong>
{% endif %}