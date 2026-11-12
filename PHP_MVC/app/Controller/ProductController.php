
<?php

class ProductController extends Controller
{
    private Product $productModel;
    private string $uploadDir;

    public function __construct()
    {
        $this->productModel = new Product();

        $this->uploadDir = dirname(__DIR__, 2) . '/public/assets/uploads/';

        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir, 0755, true);
        }
    }

    public function index(): void
    {
        $search = trim($_GET['search'] ?? '');
        if($search !==''){
            $products = $this->productModel->search($search);
        }else{
            $products = $this->productModel->all();
        }
        $this->view('product/index',['products' => $products]);
        // $products = $this->productModel->all();
        // $this->view('product/index', ['products' => $products]);
    }

    public function create(): void
    {
        $this->view('product/create');
    }
    // create product
    public function store(): void
    {
        $imageName = null;

        // Check if image was uploaded
        if (
            isset($_FILES['image']) &&
            $_FILES['image']['error'] === UPLOAD_ERR_OK
        ) {
            $originalName = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['tmp_name'];
            // image.png
            // Get extension
            $extension = pathinfo($originalName, PATHINFO_EXTENSION); // .png

            // Generate unique filename
            $imageName = uniqid() . '.' . $extension;
            // iuyfdsdfghjkoiutrdsxdcfhj.png

            // Full upload path
            $imagePath = $this->uploadDir . $imageName;

            // Move uploaded file
            move_uploaded_file($tmpName, $imagePath);
        }

        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'description' => trim($_POST['description'] ?? ''),
            'price' => (float) ($_POST['price'] ?? 0),
            'stock' => (int) ($_POST['stock'] ?? 0),
            'image' => $imageName,
        ];

        if ($this->productModel->create($data)) {
            $this->redirect('/');
        } else {
            echo "Failed to create product.";
        }
    }
    
    public function show(): void
    {
        $id = $_GET['id'] ?? null;
    
        if (!$id || !filter_var($id, FILTER_VALIDATE_INT)) {
            die('Invalid Product ID');
        }
    
        $product = $this->productModel->find((int) $id);
    
        if (!$product) {
            die('Product not found');
        }
    
        $this->view('product/show', [
            'product' => $product
        ]);
    }

    
    public function edit(): void
        {
            $id = $_GET['id'] ?? null;
        
            if (!$id || !filter_var($id, FILTER_VALIDATE_INT)) {
                die('Invalid Product ID');
            }
        
            $product = $this->productModel->find((int) $id);
            if(!$product){
                die("Failed to edit Product");
            }
            else{
                $this->view('product/edit', [
                'product' => $product
            ]);
            }
        
        }

    public function update(): void
    {
        $id = $_POST['id'] ?? 0;     
    
        if (!$id || !filter_var($id, FILTER_VALIDATE_INT)) {
            die('Invalid Product ID');
        }
    
        // 1. Get old product
        $product = $this->productModel->find((int) $id);
    
        if (!$product) {
            die('Product not found');
        }
    
        // 2. Keep old image
        $imageName = $product['image'];
    
        // 3. Check if user selected a new image
        if (
            isset($_FILES['image']) &&
            $_FILES['image']['error'] === UPLOAD_ERR_OK
        ) {
            $originalName = $_FILES['image']['name'];
            $tmpName = $_FILES['image']['tmp_name'];
    
            // Get extension
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
    
            // Generate new unique filename
            $newImageName = uniqid() . '.' . $extension;
    
            // Full upload path
            $imagePath = $this->uploadDir . $newImageName;
    
            // Move uploaded file
            if (move_uploaded_file($tmpName, $imagePath)) {
    
                // Delete old image
                if (
                    !empty($product['image']) &&
                    file_exists($this->uploadDir . $product['image'])
                ) {
                    unlink($this->uploadDir . $product['image']);
                }
    
                // Use new image
                $imageName = $newImageName;
            }
        }
    
        // 4. Prepare data
        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'description' => trim($_POST['description'] ?? ''),
            'price' => (float) ($_POST['price'] ?? 0),
            'stock' => (int) ($_POST['stock'] ?? 0),
            'image' => $imageName,
        ];
    
        // 5. Update database
        if ($this->productModel->update((int) $id, $data)) {
            $this->redirect('/');
        } else {
            echo "Failed to update product.";
        }
    }

    // delete product
    public function destroy(): void{
        $id = (int)($_GET["id"] ?? 0);
        if ($id <= 0) {$this->redirect('/'); return;}
        $product = $this->productModel->find($id);
        if ($product && !empty($product['image'])){
            $imagePath = $this->uploadDir . $product['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $this->productModel->delete($id);
        $this->redirect('/'); return;
    }

    
    



}
