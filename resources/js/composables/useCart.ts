import { ref, computed } from 'vue';

export interface CartItem {
  id: number;
  name: string;
  price_per_unit: number;
  price_unit: string;
  quantity: number;
}

const cartItems = ref<CartItem[]>([]);

export function useCart() {
  const addToCart = (product: any, quantity: number = 1) => {
    const existingItem = cartItems.value.find(item => item.id === product.id);
    
    if (existingItem) {
      existingItem.quantity += quantity;
    } else {
      cartItems.value.push({
        id: product.id,
        name: product.name,
        price_per_unit: product.price_per_unit,
        price_unit: product.price_unit,
        quantity,
      });
    }
  };

  const removeFromCart = (productId: number) => {
    cartItems.value = cartItems.value.filter(item => item.id !== productId);
  };

  const updateQuantity = (productId: number, quantity: number) => {
    const item = cartItems.value.find(item => item.id === productId);
    if (item) {
      if (quantity <= 0) {
        removeFromCart(productId);
      } else {
        item.quantity = quantity;
      }
    }
  };

  const clearCart = () => {
    cartItems.value = [];
  };

  const cartCount = computed(() => {
    return cartItems.value.reduce((total, item) => total + item.quantity, 0);
  });

  const cartTotal = computed(() => {
    return cartItems.value.reduce((total, item) => total + (item.price_per_unit * item.quantity), 0);
  });

  const dpAmount = computed(() => {
    return Math.ceil(cartTotal.value * 0.3); // 30% DP
  });

  return {
    cartItems,
    addToCart,
    removeFromCart,
    updateQuantity,
    clearCart,
    cartCount,
    cartTotal,
    dpAmount,
  };
}
