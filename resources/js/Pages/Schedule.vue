<template>
    <div class="py-12 welcome">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="background-color: rgba(128, 128, 128, 0.8);">
  
  
          <div class="text-container">
            <div class="text">
              <h1>Categories</h1>
              <p>Browse through our product categories and explore our wide range of offerings.</p>
            </div>
          </div>
          <div class="outer-container">
            <div class="container">
              <div class="card" v-for="category in categories" :key="category.id">
                <h1>{{ category.name }}</h1>
                <p>{{ category.description }}</p>
                <router-link :to="{ name: 'products', query: { category: category.id } }" class="apply-btn">
                  View Products
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import MyLayout from '@/Layouts/MyLayout.vue';
  
  const categories = [
    { id: 1, name: 'Electronics', description: 'Explore the latest gadgets and electronic devices.' },
    { id: 2, name: 'Clothing', description: 'Discover trendy fashion items and apparel.' },
    { id: 3, name: 'Home & Kitchen', description: 'Find essential items for your home and kitchen.' },
    // Add more sample categories as needed
  ];
  
  defineOptions({
    layout: MyLayout
  });
  </script>
  
  <style scoped>
  .welcome {
    background-image: url('https://th.bing.com/th/id/OIP.vR4Fx1gRANDmzx4pdGjRPwHaEK?rs=1&pid=ImgDetMain');
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
    background-color: #374151;
    border-radius: 20px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
    color: white;
  }
  
  .card h1 {
    font-size: 24px;
    font-weight: bold;
  }
  
  .card p {
    font-size: 16px;
  }
  
  .apply-btn {
    background-color: #f97316;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s;
  }
  
  .apply-btn:hover {
    background-color: #ea580c;
  }
  </style>
  