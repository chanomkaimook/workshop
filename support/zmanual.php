<?
/**
 * =====================================================
 * Tool function
 * =====================================================
*/
$this->log = new MyLog();

$this->log->log_login($data);
$this->log->log_insert($table,$data);
$this->log->log_update($table,$data);
$this->log->log_download($table,$data);		// paramiter 3 = true or false (code system = 0)
$this->log->log_error($table,$data);				// paramiter 3 = true or false (code system = 0)
$this->log->log_delete($table,$data);				// paramiter 3 = true or false (code system = 0)
$this->log->log_serious($table,$data,$textnoti = null);	//	เก็บที่ table log ด้วย    paramiter 4 = true or false (code system = 0)

// path ตรง
use App\Libraries\MyAuth;
$this->getRole(['human']);	// return role เป็น array [human=>[c,r,u,d]]
$this->checkRole(['human']);	// return true false
$this->checkTableRole(['human']);	// return true false
$this->checkPermit($this->rolename,['c','r','u','d','approve']);	// return true false

// path basecontroller
use App\Libraries\MyAuth;
$this->getRole(['human']); 		// return role เป็น array [human=>[c,r,u,d]]
$this->checkRole(['human']); 	// return true or forbidden
$this->checkPermit($this->rolename,['c','r','u','d','approve']);

// helper('sql')
getSql($table = null, $where = [], $select = ['*'], $orderby = ['id desc']);		//	return paramiter or null

// helper('myfunction')
nullToNull($paramiter);		//	return paramiter or null

<script>
	// รีเซต ฟอร์ม
	$(document).on('hide.bs.modal', '#form-add-modal', function() {
		document.frm_add.reset();

		frm.validate().resetForm();
	});
</script>
/**
 * =====================================================
 * System
 * =====================================================
 * namespace Modules\Log\Controllers;
 * class LogController extends \CodeIgniter\Controller
 * public function show()
 */
	echo __FUNCTION__;		// show
    echo __DIR__;			// D:\myproject\ci4\modules\Log\Controllers
    echo __FILE__;			// D:\myproject\ci4\modules\Log\Controllers\LogController.php
    echo __NAMESPACE__;		// Modules\Log\Controllers
    echo __TRAIT__;
    echo __CLASS__;			// Modules\Log\Controllers\LogController
 
/**
 * =====================================================
 * URL
 * =====================================================
 */
	// get url
	$uri = $request->getUri();

	echo "scheme = ".$uri->getScheme();         // http
	echo "Auth = ".$uri->getAuthority()."<br>";      // snoopy:password@example.com:88
	echo "user = ".$uri->getUserInfo()."<br>";       // snoopy:password
	echo "host = ".$uri->getHost()."<br>";          // example.com
	echo "post = ".$uri->getPort()."<br>";           // 88
	echo "path = ".$uri->getPath()."<br>";           // /path/to/page
	echo "query = ".$uri->getQuery()."<br>";          // foo=bar&bar=baz
	var_dump($uri->getQuery())."<br>";       // ['path', 'to', 'page']
	echo "segment = ".$uri->getSegment(1)."<br>";       // 'path'
	echo "total = ".$uri->getTotalSegments()."<br>";  // 3

 /**
 * =====================================================
 * php html
 * =====================================================
 */
    // เหมาะกับ tag a
    $url = 'get1';
    esc($url, 'url');

    esc(app_timezone());
	
/**
 * =====================================================
 * Route
 * =====================================================
 *  
 * ใช้ route http-verb ดีที่สุด ช่วยป้องกันเรื่อง csrf
 */
	// กำหนดชื่อเรียก
	$routes->add('users/(:num)/gallery(:any)', 'Galleries::showUserGallery/$1/$2', ['as' => 'user_gallery']);

	// กำหนด host,sub เฉพาะ
	$routes->get('/admins', '\Modules\Admin\Controllers\Admin::index',['hostname' => 'localhost:8080']);
	$routes->add('from', 'to', ['subdomain' => 'media']);
	$routes->add('from', 'to', ['subdomain' => '*']);

	// กำหนด reg
	$routes->addPlaceholder('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');
	$routes->add('users/(:uuid)', 'Users::show/$1');

	// ใช้ได้ดีในเวลาต้องไป login กับรหัส
	$routes->add('login/(.+)', 'Auth::login/$1');
	
	// ต้องมีค่า authentication
	$routes->group('api', ['filter' => 'api-auth'], function ($routes) {
		$routes->resource('users');
	});

/**
 * =====================================================
 * Log message
 * =====================================================
 *  
 * ปรับค่าต่างๆได้ที่ config/Logger.php
 * ไฟล์จะอยู่ที่ writtable/logs/
 * โหลด $request = service('request');
 */

    // Ip address
    $request->getIPAddress();

    $request->getUri()->getPath();    // the URI being requested (i.e., /about)
    $request->getMethod();    // get, post, put, etc
    $request->getGet('foo');
    $request->getPost('foo');
    $request->getVar('foo');    // get or post
    $request->getJSON();   // Retrieve JSON from AJAX calls
    $request->getServer('Host');   // Retrieve server variables

    // Retrieve an HTTP Request header, with case-insensitive names
    $request->getHeader('host');
    $request->getHeader('Content-Type');

    /**
     * ประเภทของรายละเอียด
     * 
     */
    $userAgent = $request->getUserAgent();
    if ($userAgent) :
        echo "<p>Browser : {$userAgent->getBrowser()}</p>";
        echo "<p>version : {$userAgent->getVersion()}</p>";
        echo "<p>Robot : {$userAgent->getRobot()}</p>";
        echo "<p>Mobile : {$userAgent->getMobile()}</p>";

    else :
        echo "agent plateform : {$userAgent->getPlatform()}";
    endif;

    // Generates a message like: User 123 logged into the system from 127.0.0.1
    $info = [
        'id' => $user->id,
        'ip_address' => $this->request->getIPAddress()
    ];
    log_message('info', 'User {id} logged into the system from {ip_address}', $info);

    /**
     * แบบ try catch
     */
    try {
        // Something throws error here
    } catch (\Exception $e) {
        log_message('error', '[ERROR] {exception}', ['exception' => $e]);
    }

/**
 * =====================================================
 * Validate
 * =====================================================
 */
	//
	// such as
	class UserModel extends Model
	{
		protected $validationRules    = [
			'username'     => 'required|alpha_numeric_space|min_length[3]',
			'email'        => 'required|valid_email|is_unique[users.email]',
			'password'     => 'required|min_length[8]',
			'pass_confirm' => 'required_with[password]|matches[password]',
		];

		protected $validationMessages = [
			'email'        => [
				'is_unique' => 'Sorry. That email has already been taken. Please choose another.',
			],
		];
	}
	
	//
	// ใส่ค่า error
	$validationRules = [
		'username' => 'required|alpha_numeric_space|min_length[3]',
		'email' => [
			'rules'  => 'required|valid_email|is_unique[users.email]',
			'errors' => [
				'required' => 'We really need your email.',
			],
		],
	];
	$model->setValidationRules($validationRules);
	
	//
	// แบบ 2 paramiter
	$fieldName = 'name';
	$fieldValidationMessage = [
		'required' => 'Your name is required here',
	];
	$model->setValidationMessage($fieldName, $fieldValidationMessage);
	
	//
	// แบบแยกตาม error (เเนะนำ)
	$fieldValidationMessage = [
		'name' => [
			'required'   => 'Your baby name is missing.',
			'min_length' => 'Too short, man!',
		],
	];
	$model->setValidationMessages($fieldValidationMessage);

    // 
    $this->validate([
        'title' => 'required|min_length[3]|max_length[255]',
        'body' => 'required'
    ]);
	
	// หาก insert, update, save ไม่สำเร็จ return error ได้
	if ($model->save($data) === false) {
		return view('updateUser', ['errors' => $model->errors()]);
	}
	
	//
	//	เเทนที่ตัวแปร
	protected $validationRules = [
		'email' => 'required|valid_email|is_unique[users.email,id,{id}]'
	];
	// เมื่อมีค่าเข้ามาและกำหนด id=4
	$_POST = [
		'id' => 4,
		'email' => 'foo@example.com'
	];
	// ตัวแปรข้างต้นจะมีลักษณะแบบนี้
	protected $validationRules = [
		'email' => 'required|valid_email|is_unique[users.email,id,4]'
	];

	//	
	$validation->setRules([
			'username' => [
				'label'  => 'Username',
				'rules'  => 'required|is_unique[users.username]',
				'errors' => [
					'required' => 'All accounts must have {field} provided',
				],
			],
			'password' => [
				'label'  => 'Password',
				'rules'  => 'required|min_length[10]',
				'errors' => [
					'min_length' => 'Your {field} is too short. You want to get hacked?',
				],
			]
		]
	);
/**
 * =====================================================
 * Initialize form
 * =====================================================
 */
	//	ต้องมีการ allow ตัวแปร เพื่ออนุญาตให้ตัวแปรจาก form ใช้งานได้
	protected $allowedFields = ['name','name_th','user_update'];
	
	$this->allowedFields[] = 'middlename';

/**
 * =====================================================
 * Model Events
 * =====================================================
 */
 $beforeInsert;
 $afterInsert;
 $beforeUpdate;
 $afterUpdate;
 $afterFind;
 $afterDelete;
 
/**
 * =====================================================
 * QUERY
 * =====================================================
 */

    use CodeIgniter\Model;

    class NewsModel extends Model
    {
        //  ตัวแปร $table สามารถกำหนดเพื่อเป็นตัวแปรของ query table ได้เลย
        protected $table = 'news'; 
		
		// กำหนดเพื่อบอกว่า table นี้มี primarykey ชื่ออะไร
		protected $primaryKey = 'id';
		
		// กำหนดเพื่อเลือกได้ว่าต้องการ return ค่าแบบ array หรือ object
		protected $returnType     = 'array';
		
		protected $useSoftDeletes = true;	// ถ้าเป็น true จะเปลี่ยนเเปลงข้อมูลใน  column delete_at

		protected $allowedFields = ['name', 'email'];

		protected $useTimestamps = false;
		protected $createdField  = 'created_at';
		protected $updatedField  = 'updated_at';
		protected $deletedField  = 'deleted_at';	// กำหนด column ที่ไว้ลบ

		protected $validationRules    = [];
		protected $validationMessages = [];
		protected $skipValidation     = false;
    }

    //  
    //  รูปแบบนี้เป็นไปตามกฎ CI4 และ return ค่ามาแบบ array
    //  ดึงค่าอ่านแบบ $news_item[id]
    function getNews($slug = false)
    {
        if ($slug === false) {

            // all data
            return $this->findAll();
        }

        //  return data ตัวแรกที่ค้นหาเจอตามเงื่อนไข 
        return $this->where(['slug' => $slug])->first();
    }

    //  แนะนำ
    //  เขียนแบบ query builder
    //  return แบบ object ($news_item->id)
    function getNews2($slug = false)
    {
        $db = \Config\Database::connect();      // call database
        $builder = $db->table($this->table);    // เรียก table

        if ($slug === false) {
            
            $builder->where(['cancel is null'=> null]);     // กำหนดเงื่อนไข
            $builder->orderBy('id','desc'); // เรียงลำดับ
            // $sql = $builder->getCompiledSelect();echo $sql;  // อ่าน query ที่เขียนไป (ต้องวางไว้ต่อจาก query ที่เขียนก่อน get)
            $query = $builder->get();
            
            return $query->getResult(); // เรียกดูข้อมูลวนลูป
            // return $this->findAll();
        }

        $builder->where(['id' => $slug]);
        $query = $builder->get();

        return $query->getRow();    // เรียกดูข้อมูลแถวเดียว
        // return $this->where(['slug' => $slug])->first();
    }
	
	//	หากอยากนับค่าหลังจาก get ไปแล้ว
	$q_staff->resultID->num_rows
	
	$user = $userModel->find($user_id);		// ส่งค่าตาม primarykey ที่กำหนด
	$users = $userModel->find([1,2,3]);		// ส่งค่าตาม primarykey ที่กำหนด
	
	$user = $userModel->findColumn($column_name);	// ส่ง array column ที่กำหนด
	
	$users = $userModel->findAll();
	$users = $userModel->findAll($limit, $offset);
	$users = $userModel->first();		// ส่งคืนค่าแรก
	
	// Only gets non-deleted rows (deleted = 0) หากกำหนด $useSoftDeletes เป็น true จะไม่ส่งค่าที่ column deleted is not null
	$activeUsers = $userModel->findAll();
	
	// Gets all rows หากกำหนด $useSoftDeletes เป็น true แต่ต้องการบาง query ให้ส่งค่าโดยไม่เอาเงื่อนไข delete มาร่วม
	$allUsers = $userModel->withDeleted()->findAll();
	
	// ส่งค่าลบทั้งหมด
	$deletedUsers = $userModel->onlyDeleted()->findAll();
	
	// บันทึกข้อมูล
	$data = [
		'username' => 'darth',
		'email'    => 'd.vader@theempire.com',
	];
	$userModel->insert($data);
	
	// 
	// update data
	$data = [
		'username' => 'darth',
		'email'    => 'd.vader@theempire.com',
	];
	$userModel->update($id, $data);
	
	//
	// uยdate ข้อมูลแบบหลาย id โดยเรียกครั้งเดียว
	$data = [
		'active' => 1,
	];
	$userModel->update([1, 2, 3], $data);	//	ส่ง id หลักเป็น paramiter แรก
	
	//
	//	chain
	$userModel
    ->whereIn('id', [1,2,3])
    ->set(['active' => 1])
    ->update();
	
	//
	// save จะดักว่าหากมีการกำหนด $primarykey แล้วค่าที่ส่งไป ตรงกับ primarykey ของตัวหลัก จะทำการ update เเทน insert
	$primaryKey = 'id';

	// Does an insert()
	$data = [
		'username' => 'darth',
		'email'    => 'd.vader@theempire.com',
	];

	$userModel->save($data);

	// Performs an update, since the primary key, 'id', is found.
	$data = [
		'id'       => 3,	//	primary
		'username' => 'darth',
		'email'    => 'd.vader@theempire.com',
	];
	$userModel->save($data);
	
	//
	// delete
	$userModel->delete(12);
	
	$userModel->delete([1,2,3]);
	
	$userModel->where('id', 12)->delete();
	
	//
	// clean table delete ล้างข้อมูลที่ลบ อย่างถาวร
	$userModel->purgeDeleted();
	
	// ในบางครั้ง ต้องการปิดการป้องกัน field ต่างๆ
	$model->protect(false)
      ->insert($data)
      ->protect(true);
	 
	// Return array	
	$users = $userModel->asArray()->where('status', 'active')->findAll();
	 
	// Return as standard objects
	$users = $userModel->asObject()->where('status', 'active')->findAll();

	// Return as custom class instances
	$users = $userModel->asObject('User')->where('status', 'active')->findAll();

/**
 * =====================================================
 * Migration
 * =====================================================
 * app/Database/Migrations/ 
 * such as 20121031100537_add_blog.php.
 */
 
 // migration
	 namespace App\Database\Migrations;

	use CodeIgniter\Database\Migration;

	class AddBlog extends Migration
	{
		public function up()
		{
			$this->forge->addField([
				'blog_id'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true,
				],
				'blog_title'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
				],
				'blog_description' => [
					'type' => 'TEXT',
					'null' => true,
				],
			]);
			$this->forge->addKey('blog_id', true);
			$this->forge->createTable('blog');
		}

		public function down()
		{
			$this->forge->dropTable('blog');
		}
	}
	
	//
	// สามารถสร้างเป็น group ได้
	protected $DBGroup = 'alternate_db_group';

    public function up()
    {
        // ...
    }

    public function down()
    {
        // ...
    }
 
 
	//
	// migrate
	// 	สร้าง controller
	namespace App\Controllers;

	class Migrate extends \CodeIgniter\Controller
	{
		public function index()
		{
			$migrate = \Config\Services::migrations();

			try {
				$migrate->latest();
			} catch (\Throwable $e) {
				// Do something with the error here...
			}
		}
	}
	
	// ใช้คำสั่ง terminal
	/**
	 * -g - to chose database group, otherwise default database group will be used.
	 * -n - to choose namespace, otherwise (App) namespace will be used.
	 * --all - to migrate all namespaces to the latest migration
	 */
	php spark migrate
	
	// ตัวอย่างนี้จะย้ายเนมสเปซ Acme\Blog ด้วยการย้ายข้อมูลใหม่ในกลุ่มฐานข้อมูลทดสอบ:
	php spark migrate -g test -n 'Acme\Blog'
	
	// rollback
	/**
	 * -g - to choose database group, otherwise default database group will be used. กำหนดชื่อกลุ่มฐานข้อมูล
	 * -b - to choose a batch: natural numbers specify the batch, negatives indicate a relative batch
	 * -f - to force a bypass confirmation question, it is only asked in a production environment จะถามในสถานะ production
	 */
	php spark migrate:rollback
	
	// refresh
	/**
	 -g - to choose database group, otherwise default database group will be used.
	-n - to choose namespace, otherwise (App) namespace will be used.
	--all - to refresh all namespaces
	-f - to force a bypass confirmation question, it is only asked in a production environment
	 */
	> php spark migrate:refresh
	
/**
 * =====================================================
 * SEEDING
 * =====================================================
 * ควรตั้งชื่อตัวข้อมูล table ตามชื่อ table (ไม่ต้องมี seeder ตามหลัง) -> php spark make:seeder partner
 * ตัว run ให้สร้างโดย  php spark make:seeder test --suffix
 * ให้ใส่ call ทั้งหมดลงในไฟล์  TestSeeder ( $this->call('Partner') );
 * สั่ง run -> php spark db:seed TestSeeder
 */
	//
	namespace App\Database\Seeds;

	use CodeIgniter\Database\Seeder;

	class SimpleSeeder extends Seeder
	{
		public function run()
		{
			$data = [
				'username' => 'darth',
				'email'    => 'darth@theempire.com'
			];

			// Simple Queries
			$this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)", $data);

			// Using Query Builder
			$this->db->table('users')->insert($data);
		}
	}
	
	// สร้างแบบ group
	namespace App\Database\Seeds;

	use CodeIgniter\Database\Seeder;

	class TestSeeder extends Seeder
	{
		public function run()
		{
			$this->call('UserSeeder');
			$this->call('CountrySeeder');
			$this->call('JobSeeder');
		}
	}
	
	// run ผ่าน controller
	$seeder = \Config\Database::seeder();
	$seeder->call('TestSeeder');
	
	// run cmd
	> php spark db:seed TestSeeder
	
	// create seeder
	> php spark make:seeder test --suffix
 
/**
 * =====================================================
 * DATABASE
 * =====================================================
 */
	//
	// database
	$forge = \Config\Database::forge();
 
	$this->myforge = \Config\Database::forge('other_db');
	
	// paramiter ที่กำหนดให้เช็คก่อนว่ามีบน database หรือไม่
	$forge->createDatabase('my_db', true);
	
	// drop
	if ($forge->dropDatabase('my_db')) {
		echo 'Database deleted!';
	}
	
	// paramiter ที่กำหนดให้เช็คก่อนว่ามีบน database หรือไม่
	$forge->dropTable('table_name', true);
	
	
	
	//	create table
	/**
	 * unsigned/true : to generate “UNSIGNED” in the field definition.
	 * default/value : to generate a default value in the field definition.
	 * null/true : to generate “null” in the field definition. Without this, the field will default to “NOT null”.
	 * auto_increment/true : generates an auto_increment flag on the field.
	 * unique/true : to generate a unique key for the field definition. ห้ามมีค่าซ้ำกัน
	 */
	$fields = [
		'id'          => [
			'type'           => 'INT',
			'constraint'     => 5,
			'unsigned'       => true,
			'auto_increment' => true
		],
		'title'       => [
			'type'           => 'VARCHAR',
			'constraint'     => '100',
			'unique'         => true,
		],
		'author'      => [
			'type'           =>'VARCHAR',
			'constraint'     => 100,
			'default'        => 'King of Town',
		],
		'description' => [
			'type'           => 'TEXT',
			'null'           => true,
		],
		'status'      => [
			'type'           => 'ENUM',
			'constraint'     => ['publish', 'pending', 'draft'],
			'default'        => 'pending',
		],
	];
	
	//
	// สามารถเพิ่ม field
	$forge->addField("label varchar(100) NOT NULL DEFAULT 'default label'");
	//
	$forge->addField('id');	// gives `id` INT(9) NOT NULL AUTO_INCREMENT อัตโนมัติ
	
	// สร้าง table
	// gives CREATE TABLE table_name
	$forge->createTable('table_name');
	
	// gives ALTER TABLE `table_name` CHANGE `old_name` `new_name` TEXT
	$fields = [
		'old_name' => [
			'name' => 'new_name',
			'type' => 'TEXT',
		],
	];
	$forge->modifyColumn('table_name', $fields);
	
	
	$forge->dropColumn('table_name', 'column_1,column_2'); // by proving comma separated column names
	$forge->dropColumn('table_name', ['column_1', 'column_2']); // by proving array of column names

	// gives PRIMARY KEY `blog_id_site_id` (`blog_id`, `site_id`)
	$forge->addKey('blog_id', true);
	$forge->addKey('site_id', true);
	
	// gives KEY `blog_name_blog_label` (`blog_name`, `blog_label`)
	$forge->addKey(['blog_name', 'blog_label']);
	
	// gives UNIQUE KEY `blog_id_uri` (`blog_id`, `uri`)
	$forge->addKey(['blog_id', 'uri'], false, true);
	
	// gives PRIMARY KEY `blog_id` (`blog_id`)
	$forge->addPrimaryKey('blog_id');
	
	// gives UNIQUE KEY `blog_id_uri` (`blog_id`, `uri`)
	$forge->addUniqueKey(['blog_id', 'uri']);
	
	// gives CONSTRAINT `TABLENAME_users_foreign` FOREIGN KEY(`users_id`) REFERENCES `users`(`id`)
	$forge->addForeignKey('users_id', 'users', 'id');

	// gives CONSTRAINT `TABLENAME_users_foreign` FOREIGN KEY(`users_id`, `users_name`) REFERENCES `users`(`id`, `name`)
	$forge->addForeignKey(['users_id', 'users_name'], 'users', ['id', 'name']);
	
	// Produces: ALTER TABLE `tablename` DROP FOREIGN KEY `users_foreign`
	$forge->dropForeignKey('tablename', 'users_foreign');
	
	// Produces: DROP INDEX `users_index` ON `tablename`
	$forge->dropKey('tablename', 'users_index');
	
	// gives ALTER TABLE `old_table_name` RENAME TO `new_table_name`
	$forge->renameTable('old_table_name', 'new_table_name');

	// Executes: ALTER TABLE `table_name` ADD `preferences` TEXT
	$fields = [
		'preferences' => ['type' => 'TEXT']
	];
	$forge->addColumn('table_name', $fields);
	
/**
 * =====================================================
 * API
 * =====================================================
 */
	//	fetch api
	fetch(url, {
		method: "get",
		headers: {
		  "Content-Type": "application/json",
		  "X-Requested-With": "XMLHttpRequest"
		}
	});
	
	//	ตัวอย่างการ ตั้งค่า api
	namespace App\Controllers;

	use CodeIgniter\RESTful\ResourceController;

	class Photos extends ResourceController
	{
		protected $modelName = 'App\Models\Photos';
		protected $format    = 'json';

		public function index()
		{
			return $this->respond($this->model->findAll());
		}

		// ...
	}
	
	//	เรียกค่านี้ method ของ rest api ทั้งหมดจะทำงาน
	$routes->resource('photos');
	
	
	
	// รองรับการกำหนด response method ทั่วไป
	$this->respond($data, 200);
	
	// รองรับการกำหนด failure response
	$this->fail($errors, 400);
	
	// รองรับการกำหนด created response
	$this->respondCreated($data);
	
	// รองรับการกำหนด  successfully deleted
	$this->respondDeleted($data);
	
	// Command executed by no response required
	$this->respondNoContent();
	
	// รองรับการกำหนด Client isn't authorized ไม่ได้รับสิทธิ์เข้าถึง API
	$this->failUnauthorized();
	
	// รองรับการกำหนด Forbidden action ไม่สามารถใช้งานส่วนที่กำหนดได้
	$this->failForbidden();
	
	// รองรับการกำหนด Resource Not Found ไม่พบข้อมูล
	$this->failNotFound();
	
	// รองรับการกำหนด Data did not validate ข้อมูลไม่ผ่านการตรวจสอบ
	$this->failValidationError();
	
	// รองรับการกำหนด Resource already exists มีข้อมูลแล้วในระบบ
	$this->failResourceExists();
	
	// รองรับการกำหนด Resource previously deleted ข้อมูลถูกลบไปก่อนหน้า
	$this->failResourceGone();
	
	// รองรับการกำหนด Client made too many requests การจำกัดจำนวนครั้งการเข้าถึง API
	$this->failTooManyRequests();
	
	// รองรับการกำหนด Internal Server Error เกิด error ฝั่ง server 
	$this->failServerError();
	
	
	// ตัวอย่าง response
	$response = [
		'status'   => 400,
		'code'     => '321a',
		'messages' => [
			'Error message 1',
			'Error message 2',
		],
	];
	
	//
	//	Example code
	//

	//	Controller Login
	//
	namespace App\Controllers;
	  
	use App\Controllers\BaseController;
	use CodeIgniter\API\ResponseTrait;
	use App\Models\UserModel;
	use \Firebase\JWT\JWT;
	  
	class Login extends BaseController
	{
		use ResponseTrait;
		  
		public function index()
		{
			$userModel = new UserModel();
	   
			$email = $this->request->getVar('email');
			$password = $this->request->getVar('password');
			   
			$user = $userModel->where('email', $email)->first();
	   
			if(is_null($user)) {
				return $this->respond(['error' => 'Invalid username or password.'], 401);
			}
	   
			$pwd_verify = password_verify($password, $user['password']);
	   
			if(!$pwd_verify) {
				return $this->respond(['error' => 'Invalid username or password.'], 401);
			}
	  
			$key = getenv('JWT_SECRET');
			$iat = time(); // current timestamp value
			$exp = $iat + 3600;
	  
			$payload = array(
				"iss" => "Issuer of the JWT",
				"aud" => "Audience that the JWT",
				"sub" => "Subject of the JWT",
				"iat" => $iat, //Time the JWT issued at
				"exp" => $exp, // Expiration time of token
				"email" => $user['email'],
			);
			  
			$token = JWT::encode($payload, $key, 'HS256');
	  
			$response = [
				'message' => 'Login Succesful',
				'token' => $token
			];
			  
			return $this->respond($response, 200);
		}
	  
	}


	//	Controller Register
	//
	namespace App\Controllers;
	 
	use App\Controllers\BaseController;
	use CodeIgniter\API\ResponseTrait;
	use App\Models\UserModel;
	 
	 
	class Register extends BaseController
	{
		use ResponseTrait;
	 
		public function index()
		{
			$rules = [
				'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]'],
				'password' => ['rules' => 'required|min_length[8]|max_length[255]'],
				'confirm_password'  => [ 'label' => 'confirm password', 'rules' => 'matches[password]']
			];
				
	  
			if($this->validate($rules)){
				$model = new UserModel();
				$data = [
					'email'    => $this->request->getVar('email'),
					'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
				];
				$model->save($data);
				 
				return $this->respond(['message' => 'Registered Successfully'], 200);
			}else{
				$response = [
					'errors' => $this->validator->getErrors(),
					'message' => 'Invalid Inputs'
				];
				return $this->fail($response , 409);
				 
			}
				
		}
	}

/**
 * =====================================================
 * CURL ต้องมี host
 * =====================================================
 */
	//
	$client = \Config\Services::curlrequest();
	$options = [
			'baseURI' => 'http://example.com/api/v1/',
			'timeout'  => 3
	];
	$client = \Config\Services::curlrequest($options);
	// หรือ
	$client = service('curlrequest');
	$options = [
			'baseURI' => 'http://example.com/api/v1/',
			'timeout'  => 3
	];
	$client = service('curlrequest',$options);
	
	//
	$client->request('GET', 'https://api.github.com/user', [
			'auth' => ['user', 'pass']
	]);
	// หรือ
	$client->get('https://api.github.com/user', [
			'auth' => ['user', 'pass']
	]);
	
	// ตรวจสอบข้อมูลว่าเป็น JSON หรือไม่
	$body = $response->getBody();
	if (strpos($response->getHeader('content-type'), 'application/json') !== false)
	{
			$body = json_decode($body); // แปลง JSON เป็น Array
			print_r($body); // ทดสอบแสดงค่า
	}


	//	
	$client->get('/users', ['allow_redirects' => [
        'max'       => 10,
        'protocols' => ['https'] 
	]]);
	// ค่าที่สามารถกำหนดเพิ่มเติม
	'max'       => 5, // จำนวน redirect สูงสุดก่อนหยุด
	'strict'    => true, // ให้ตัวแปร POST สามารถส่งต่อๆ ไปในการ redirect ได้
	'protocols' => ['http', 'https'] // กำหนด หรือจำกัด protocal ที่จะ redirect ได้
	
	// โดยปกติเมื่อทำการ request โดยใช้งาน CURLRequest หากมีข้อผิดพลาดเกิดขึ้น หรือมี HTTP 
	// Code มากกว่า 400 จะไม่คืนค่าส่วนของเนื้อหาหรือ body ข้อมูลใดๆ กลับมาก แต่เราสามารถกำหนดให้
	// สามารถคืนค่าเป็นรูปแบบข้อความที่ต้องการได้ โดยกำหนด http_errors option ในลักษณะดังนี้
	$response = $client->get('/status/500', ['http_errors' => false]);
	echo $response->getStatusCode(); // 500
	
	// request นี้จะทำงานนานสุดไม่เกิน 5 วินาที หากยังไม่มีข้อมูลกลับมาใน 5 วินาที 
	// ก็ให้หยุดการทำงานไป
	$client->get('/users', ['timeout' => 5]);
	
	// ใช้งาน CA bundle ของระบบ (ค่านี้เป็นค่าเริ่มต้น ไม่กำหนดก็ได้ ถ้าใช้ค่านี้)
	$client->get('/users', ['verify' => true]);
	 
	// ใช้งาน SSL certificate แบบกำหนดเอง
	$client->get('/users', ['verify' => '/path/to/cert.pem']);
	 
	// ปิดการตรวจสอบความทั้งหมด. (ไม่ปลอดภัย แต่ก็ขึ้นกับการใช้งาน)
	$client->get('/users', ['verify' => false]);


	
	
	
