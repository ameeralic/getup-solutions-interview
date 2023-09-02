<template>
  <div :class="{ 'w-full': fullWidth }">
    <button
      type="submit"
      :class="{
        'bg-blue-700 hover:bg-blue-800 focus:ring-blue-300  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800':
          color === 'blue',
        'bg-indigo-700 hover:bg-indigo-800 focus:ring-indigo-300  dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800':
          color === 'indigo',
        'bg-red-700 hover:bg-red-800 focus:ring-red-300  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800':
          color === 'red',
        'bg-green-700 hover:bg-green-800 focus:ring-green-300  dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800':
          color === 'green',
        'w-full': fullWidth,
        'rounded-full': rounded,
        'rounded-lg': !rounded,
      }"
      id="login-button"
      class="text-white focus:ring-4 focus:outline-none text-sm px-5 py-2.5 text-center flex items-center justify-center"
    >
      <slot> </slot>
      <div
        v-html="disableFlash ? text : show && flash.success ? flash.success : text"
        id="login-button-text"
      ></div>
    </button>
    <!-- <div class="h-5 my-4">
      <p
        v-if="show && !disableFlash"
        class="'text-transparent bg-transparent text-sm font-medium px-4 border-l-2 border-transparent'"
        :class="{
          'text-green-600 bg-green-100 text-sm font-medium px-4 border-l-2 border-green-500':
            flash && !disableFlash,
        }"
        v-html="flash.success"
      ></p>
    </div> -->
  </div>
</template>
<script>
export default {
  props: ["text", "color", "fullWidth", "disableFlash", "rounded"],
  data() {
    return {
      show: false,
    };
  },
  mounted() {
    this.show = true;
    setTimeout(() => (this.show = false), 2000);
  },
  computed: {
    flash() {
      return this.$page.props.flash;
    },
  },
  watch: {
    flash: {
      deep: true,
      handler(val, oldVal) {
        this.show = true;
        setTimeout(() => (this.show = false), 2000);
      },
    },
  },
};
</script>
<style>
#login-button{
  border-radius: 15px;
background: #EF4A73;
width: 488px;
height: 52px;
flex-shrink: 0;
}
#login-button-text{
  color: #FFF;
text-align: center;
font-family: 'Roboto', sans-serif;
font-size: 24px;
font-style: normal;
font-weight: 400;
line-height: normal;
letter-spacing: 3.6px;
text-transform: uppercase;
}
</style>
