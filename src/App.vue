<template>
  <div>
    <form id="form" @submit.prevent="submitForm">
      <label>
        <input type="text" v-model="name" placeholder="Имя:" required>
      </label>
      <label>
        <input type="email" v-model="email" placeholder="Email:" required>
      </label>
      <label>
        <input type="tel" v-model="phone" placeholder="Телефон:" required>
      </label>
      <label>
        <input type="number" v-model="price" placeholder="Цена:" required>
      </label>
      <button type="submit">Отправить</button>
    </form>
  </div>

</template>

<script>

export default {
  name: 'App',
  data() {
    return {
      price: '',
      phone: '',
      email: '',
      name: '',
    }
  },
  methods: {
    submitForm() {
      const data = {
        name: this.name,
        email: this.email,
        phone: this.phone,
        price: this.price
      };
      axios.post('/api/create-lead.php', data)
          .then((res) => {
            console.log(res)
          })
          .catch((error) => {
            console.error('Error:', error);
          });
    }
  }


}
</script>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  display: flex;
  justify-content: center;
  color: #2c3e50;
  margin-top: 60px;
}

#form {
  display: flex;
  align-items: center;
  row-gap: 20px;
  flex-direction: column;
  width: 500px;
}
label{
  width: 500px;
}
input {
  width: 100%;
  height: 40px;
  padding:10px;
  margin:10px 0; // add top and bottom margin
}
button {
  /* remove default behavior */
  appearance:none;
  -webkit-appearance:none;
  /* usual styles */
  padding:10px;
  border:none;
  background-color:#3F51B5;
  color:#fff;
  font-weight:600;
  border-radius:5px;
  width:250px;
}

input {
  padding:10px;
  border:0;
  box-shadow:0 0 15px 4px rgba(0,0,0,0.06);
}

</style>
