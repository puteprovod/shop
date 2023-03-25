<template>
    <main class="overflow-hidden">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" style="background-image: url(assets/images/inner-pages/breadcum-bg4.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content text-center wow fadeInUp animated">
                            <h2>Wishlist</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                                    <li> <i class="flaticon-next"></i> </li>
                                    <li class="active">Wishlist</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Breadcrumb Style2-->
        <!--Start Wishlist-->
        <section class="wishlist pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 wow fadeInUp animated">
                        <div class="wishlist-table-box">
                            <div class="wishlist-table-outer">
                                <table class="wishlist-table">
                                    <thead class="wishlist-header">
                                    <tr>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Stock Status</th>
                                        <th>Quantity</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="product in products">
                                        <td>
                                            <div class="wishlist-thumb"> <img :src="product.product_images[0].url" alt=""> </div>
                                        </td>
                                        <td>
                                            <h5>{{ product.title }}</h5>
                                        </td>
                                        <td>
                                            <p class="price">${{ product.price }}.00</p>
                                        </td>
                                        <td>
                                            <p class="instock">In Stock</p>
                                        </td>
                                        <td class="add-to-cart-btn"> <a @click.prevent="addToCart(product)" href="#"
                                                                        class=" btn--primary style2 ">Add To Cart</a> </td>
                                        <td>
                                            <div class="remove"> <i @click.prevent="removeProduct(product.id)" class="flaticon-cross"></i> </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Wishlist-->
    </main>
</template>

<script>
export default {
    name: "wishlist",
    data() {
        return {
            products: [],
            wl: [],
        }
    },
    mounted() {
        $(document).trigger('changed')
        this.getWLProducts()
        console.log(this.products);
    },
    computed: {
        subtotal() {
            let sum = 0;
            this.products.forEach(productInCart => {
                sum += productInCart.price * productInCart.qty;
            })
            return sum;
        }
    },
    methods: {
        addToCart(product) {
            let cart = localStorage.getItem('cart')
            let newProduct = [{
                'id': product.id,
                'image_url': product.product_images[0].url,
                'title': product.title,
                'price': product.price,
                'qty': 1
            }];
            if (!cart) {
                localStorage.setItem('cart', JSON.stringify(newProduct))
            } else {
                cart = JSON.parse(cart)
                cart.forEach(productInCart => {
                    if (productInCart.id === product.id) {
                        productInCart.qty = Number(productInCart.qty) + 1
                        newProduct = null
                    }
                })
                Array.prototype.push.apply(cart, newProduct);
                localStorage.setItem('cart', JSON.stringify(cart))
            }
            this.$emit('addcart')
        },
        getWLProducts() {
            this.wl = JSON.parse(localStorage.getItem('wishlist'));
            this.axios.post(`/api/wishlist`, {
                'wishlist' : this.wl
            })
                .then(res => {
                    this.products = res.data.data
                    console.log(this.products)
                }).finally(v => {
            })
        },
        removeProduct(id) {
            this.wl = this.wl.filter(product => {
                return product.id !== id
            })
            this.products = this.products.filter(product => {
                return product.id !== id
            })
            this.updateWL()
            this.$emit('addwl')
        },
        updateWL() {
            localStorage.setItem('wishlist', JSON.stringify(this.wl))
        }
    }
}
</script>

<style scoped>

</style>
