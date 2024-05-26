<template>
  <div class="py-12 welcome">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-gray-800 bg-opacity-90 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="text-container">
          <div class="text">
            <h1>Our Products</h1>
            <p>Explore our latest products and find what suits your needs...</p>
          </div>
        </div>
        <div class="outer-container">
          <div class="container">
            <div class="card" v-for="(product, index) in products" :key="product.id">
              <img :src="product.imageUrl" :alt="product.name" class="product-image">
              <h2>{{ product.name }}</h2>
              <p>Price: ${{ product.price }}</p>
              <p>Category: {{ product.category }}</p>
              <p>{{ product.description }}</p>
              <div class="actions">
                <button @click="editProduct(index)" class="edit-button">Edit</button>
                <button @click="deleteProduct(index)" class="delete-button">Delete</button>
              </div>
            </div>
          </div>
          <div v-if="showAddForm" class="add-form">
            <input type="text" v-model="newProduct.name" placeholder="Product Name" class="input-field">
            <input type="number" v-model="newProduct.price" placeholder="Price" class="input-field">
            <input type="text" v-model="newProduct.category" placeholder="Category" class="input-field">
            <input type="text" v-model="newProduct.description" placeholder="Description" class="input-field">
            <input type="text" v-model="newProduct.imageUrl" placeholder="Image URL" class="input-field">
            <button @click="editing ? saveProduct(editingIndex) : addProduct()" class="add-btn">{{ editing ? 'Update' : 'Add' }}</button>
          </div>
          <button @click="toggleAddForm" class="add-button">{{ showAddForm ? 'Hide Add Form' : editing ? 'Update Product' : 'Add Product' }}</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import MyLayout from '@/Layouts/MyLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineOptions({
  layout: MyLayout
});

const products = ref([
  {
    id: 1,
    name: 'Smartphone X200',
    price: 999,
    category: 'Electronics',
    description: 'A high-end smartphone with a sleek design and powerful features.',
    imageUrl: 'https://newmobilesreview.com/wp-content/uploads/2021/12/Nokia-X200-5G-1-1024x597.jpg'
  },
  {
    id: 2,
    name: 'Wireless Headphones',
    price: 199,
    category: 'Accessories',
    description: 'Noise-cancelling headphones with long battery life and superior sound quality.',
    imageUrl: 'https://i5.walmartimages.com/asr/7969d1bc-671c-4680-ab0b-80d70b27ec89.59661ed1897c6df578c222249168913c.jpeg'
  },
  {
    id: 3,
    name: '4K Ultra HD TV',
    price: 799,
    category: 'Home Entertainment',
    description: 'A stunning 4K Ultra HD TV with vibrant colors and incredible detail.',
    imageUrl: 'https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6028/6028900_sd.jpg'
  },
  {
    id: 4,
    name: 'Gaming Laptop Pro',
    price: 1299,
    category: 'Computers',
    description: 'A powerful gaming laptop with high-end graphics and fast performance.',
    imageUrl: 'https://gamingspot.dk/wp-content/uploads/2021/06/Best-Gaming-Laptop.jpg'
  },
  {
    id: 5,
    name: 'Smartwatch Series 5',
    price: 399,
    category: 'Wearables',
    description: 'A stylish smartwatch with fitness tracking and various health monitoring features.',
    imageUrl: 'https://th.bing.com/th/id/OIP.mmfYrCHJTxXJZ7xsmY9RAwHaEK?rs=1&pid=ImgDetMain'
  }
]);

const newProduct = ref({
  name: '',
  price: 0,
  category: '',
  description: '',
  imageUrl: ''
});

const editing = ref(false);
let editingIndex;

const showAddForm = ref(false);

const toggleAddForm = () => {
  showAddForm.value = !showAddForm.value;
};

const addProduct = () => {
  const exampleData = {
    name: 'Example Product',
    price: 100,
    category: 'Example Category',
    description: 'Example Description',
    imageUrl: 'https://example.com/image.jpg'
  };

  if (
    newProduct.value.name.trim() &&
    newProduct.value.price > 0 &&
    newProduct.value.category.trim() &&
    newProduct.value.description.trim() &&
    newProduct.value.imageUrl.trim()
  ) {
    if (editing.value) {
      saveProduct(editingIndex);
    } else {
      const id = products.value.length + 1;
      products.value.push({ ...newProduct.value, id });
      clearFields();
      toggleAddForm();
    }
  } else {
    if (!newProduct.value.name.trim()) newProduct.value.name = exampleData.name;
    if (newProduct.value.price <= 0) newProduct.value.price = exampleData.price;
    if (!newProduct.value.category.trim()) newProduct.value.category = exampleData.category;
    if (!newProduct.value.description.trim()) newProduct.value.description = exampleData.description;
    if (!newProduct.value.imageUrl.trim()) newProduct.value.imageUrl = exampleData.imageUrl;

    if (
      !newProduct.value.name.trim() ||
      newProduct.value.price <= 0 ||
      !newProduct.value.category.trim() ||
      !newProduct.value.description.trim() ||
      !newProduct.value.imageUrl.trim()
    ) {
      alert('Please fill all fields');
    }
  }
};

const saveProduct = (index) => {
  const exampleData = {
    name: 'Example Product',
    price: 100,
    category: 'Example Category',
    description: 'Example Description',
    imageUrl: 'https://example.com/image.jpg'
  };

  if (
    newProduct.value.name.trim() &&
    newProduct.value.price > 0 &&
    newProduct.value.category.trim() &&
    newProduct.value.description.trim() &&
    newProduct.value.imageUrl.trim()
  ) {
    products.value[index] = { ...newProduct.value };
    clearFields();
    toggleAddForm();
    editing.value = false;
  } else {
    if (!newProduct.value.name.trim()) newProduct.value.name = exampleData.name;
    if (newProduct.value.price <= 0) newProduct.value.price = exampleData.price;
    if (!newProduct.value.category.trim()) newProduct.value.category = exampleData.category;
    if (!newProduct.value.description.trim()) newProduct.value.description = exampleData.description;
    if (!newProduct.value.imageUrl.trim()) newProduct.value.imageUrl = exampleData.imageUrl;

    if (
      !newProduct.value.name.trim() ||
      newProduct.value.price <= 0 ||
      !newProduct.value.category.trim() ||
      !newProduct.value.description.trim() ||
      !newProduct.value.imageUrl.trim()
    ) {
      alert('Please fill all fields');
    }
  }
};

const editProduct = (index) => {
  const editedProduct = products.value[index];
  newProduct.value = { ...editedProduct };
  editing.value = true;
  editingIndex = index;
};

const deleteProduct = (index) => {
  const confirmDelete = confirm('Are you sure you want to delete this product?');
  if (confirmDelete) {
    products.value.splice(index, 1);
  }
};

const clearFields = () => {
  newProduct.value = {
    name: '',
    price: 0,
    category: '',
    description: '',
    imageUrl: ''
  };
};

</script>


<style scoped>
.welcome {
  background-image: url('https://wallpapercrafter.com/desktop/209577-urban-shopping-shop-and-light-hd.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
}

.text-container {
  padding: 20px;
  text-align: center;
}

.text {
  color: white;
  font-size: 30px;
  text-align: center;
  margin-bottom: 20px;
}

.outer-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
  padding: 20px;
}

.card {
  background-color: rgba(81, 81, 55, 0.9);
  border-radius: 20px;
  padding: 20px;
  margin-bottom: 20px;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
  color: white;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  opacity: 0; /* Initially set opacity to 0 */
  animation: fadeIn 0.5s ease-in-out forwards; /* Apply fade-in animation */
}

.card:hover {
  transform: translateY(-5px);
}

.product-image {
  width: 100%;
  height: auto;
  border-radius: 10px;
  margin-bottom: 15px;
}

.card h2 {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 10px;
}

.apply-btn {
  background-color: #f97316;
  color: white;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
  transition: background-color 0.3s;
  display: inline-block;
  margin-top: 10px;
}

.apply-btn:hover {
  background-color: #ea580c;
}

/* Fade-in animation */
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

.outer-container {
  position: relative;
}

.add-button {
  position: absolute;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
  padding: 10px 20px;
  background-color: #f97316;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.add-button:hover {
  background-color: #ea580c;
}

.add-form {
  position: absolute;
  bottom: 60px;
  left: 50%;
  transform: translateX(-50%);
  padding: 20px;
  background-color: white;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.input-field {
  width: 100%;
  margin-bottom: 10px;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.add-btn {
  background-color: #f97316;
  color: white;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  cursor: pointer;
}

.add-btn:hover {
  background-color: #ea580c;
}

.actions {
  display: flex;
  justify-content: center;
  margin-top: 10px;
}

.action-button {
  padding: 8px 16px;
  margin: 0 5px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.edit-button {
  background-color: #4caf50; /* Green */
  color: white;
}

.delete-button {
  background-color: #f44336; /* Red */
  color: white;
}

.action-button:hover {
  filter: brightness(1.2); /* Darken the button on hover */
}
</style>
