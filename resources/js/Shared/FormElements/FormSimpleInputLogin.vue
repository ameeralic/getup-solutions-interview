<template>
    <div class="mb-2" id="login-form-input">
        <label
            :for="name"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
            >{{ label }}</label
        >
        <input
            :type="type"
            :name="name"
            :placeholder="placeholder ?? ''"
            :id="name"
            :value="readOnly ?? modelValue"
            :disabled="disabled"
            @input="$emit('update:modelValue', $event.target.value)"
            :class="{
                'border-2 border-rose-500': error,
                'cursor-not-allowed': disabled,
            }"
            id="login-form-input-box"
            
            class="rounded-lg border border-white focus:ring-primary-600 placeholder-[#4B506D] placeholder-opacity-40 focus:border-primary-600 block w-full p-[16px]  dark:focus:ring-primary-500 dark:focus:border-primary-500"
        />
        <div
            v-if="error"
            v-text="error"
            class="text-red-500 text-xs mt-1"
        ></div>
    </div>
</template>
<style>
#login-form-input{
    width: 488px;
height: 52px;
}
#login-form-input-box {
    border-radius: 8px;
    width: 488px;
height: 52px;
padding: 16px;
border: 1px solid var(--grayscale-gray-lightest, #F0F1F7);
background: var(--grayscale-extra-light);

}
::placeholder {
    color:  #4B506D;
/* Reg 14 (0.3 px) */
font-family: 'Mulish', sans-serif;
font-size: 14px;
font-style: normal;
font-weight: 400;
line-height: 20px; /* 142.857% */
letter-spacing: 0.3px;
}
</style>
<script>
export default {
    props: [
        "label",
        "type",
        "modelValue",
        "error",
        "name",
        "placeholder",
        "disabled",
        "readOnly",
    ],
    emits: ["update:modelValue"],
};
</script>
