<template>
    <main class="overflow-hidden ">
        <!--Start Breadcrumb Style2-->
        <div class="breadcrumb-area"
             style="background-image: url(/assets/images/inner-pages/breadcum-bg2.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content pb-60 text-center wow fadeInUp animated">
                            <h2>Online Store</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li>
                                        <router-link to="/"><i class="flaticon-home pe-2"></i>Home</router-link>
                                    </li>
                                    <li><i class="flaticon-next"></i></li>
                                    <li class="active">Products</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Breadcrumb Style2-->
        <!--Start product-grid-->
        <div class="product-grid pt-60 pb-120">
            <div class="container">
                <div class="row gx-4">
                    <div class="col-xl-3 col-lg-4">
                        <div class="shop-grid-sidebar">
                            <button class="remove-sidebar d-lg-none d-block"><i
                                class="flaticon-cross"> </i></button>
                            <div class="sidebar-holder">
                                <form action="#0" class="footer-default__subscrib-form m-0 p-0 wow fadeInUp animated">
                                    <div class="footer-input-box p-0 "><input type="text" placeholder="Search Cart"
                                                                              name="searchString">
                                        <button type="submit" class="subscribe_btn"><i
                                            class="flaticon-magnifying-glass"></i></button>
                                    </div>
                                </form>
                                <div class="single-sidebar-box mt-30 wow fadeInUp animated ">
                                    <h4>Select Categories</h4>
                                    <div class="checkbox-item">
                                        <form>
                                            <div v-for="category in filterList.categories" class="form-group"><input
                                                :value="category.id"
                                                v-model="categories"
                                                type="checkbox"
                                                :id="`cat${category.id}`">
                                                <label
                                                    :for="`cat${category.id}`">{{ category.title }}</label></div>
                                        </form>
                                    </div>
                                </div>
                                <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                    <h4>Color Option </h4>
                                    <ul class="color-option">
                                        <li v-for="color in filterList.colors"><a @click.prevent="addColor(color.id)"
                                                                                  :id="`colorPicker${color.id}`"
                                                                                  :href="`#${color.title}`"
                                                                                  class="color-option-single"
                                                                                  :style="`background: #${color.title}`">
                                            <span>{{ color.title }}</span></a></li>
                                    </ul>
                                </div>
                                <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                    <h4>Filter By Price</h4>
                                    <div class="slider-box">
                                        <div id="price-range" class="slider"></div>
                                        <div class="output-price"><label for="priceRange">Price:</label> <input
                                            type="text" id="priceRange" readonly></div>
                                    </div>
                                </div>
                                <div class="single-sidebar-box mt-30 wow fadeInUp animated border-bottom-0">
                                    <h4>Tags </h4>
                                    <ul class="popular-tag">
                                        <li v-for="tag in filterList.tags"><a @click.prevent="addTag(tag.id)" href="#0"
                                                                              :id="`tagPicker${tag.id}`"
                                                                              :href="`#${tag.title}`">{{
                                                tag.title
                                            }}</a></li>
                                    </ul>
                                </div>
                                <div class="mt-10">
                                    <button @click.prevent="filterProducts" class="allfilterbtn"
                                            type="submit"> Apply filters
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="row">
                            <div class="col-xl-12">
                                <div
                                    class="shop-grid-page-top-info p-0 justify-content-md-between justify-content-center">
                                    <div class="left-box wow fadeInUp animated">
                                        <p>Showing {{ pagination.from }}–{{ pagination.to }} of {{ pagination.total }}
                                            Results</p>
                                    </div>
                                    <div
                                        class="right-box justify-content-md-between justify-content-center wow fadeInUp animated">
                                        <div class="short-by">
                                            <div class="select-box">
                                                <select v-model="sortingSelect" @change="selectFilter"
                                                        class="wide select-simple-filter">
                                                    <option value="1">Best selling</option>
                                                    <option value="2">Alphabetically, A-Z</option>
                                                    <option value="3">Alphabetically, Z-A</option>
                                                    <option value="4">Price, low to high</option>
                                                    <option value="5">Price, high to low</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div
                                            class="product-view-style d-flex justify-content-md-between justify-content-center">
                                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-grid-tab"
                                                            data-bs-toggle="pill" data-bs-target="#pills-grid"
                                                            type="button"
                                                            role="tab" aria-selected="true">
                                                        <i class="flaticon-grid"></i>
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-list-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-list" type="button" role="tab"
                                                            aria-selected="false">
                                                        <i class="flaticon-list"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                            <button class="slidebarfilter d-lg-none d-flex"><i
                                                class="flaticon-edit"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-grid" role="tabpanel"
                                         aria-labelledby="pills-grid-tab">
                                        <div class="row">
                                            <div v-for="product in products" class="col-xl-4 col-lg-6 col-6">
                                                <div class="products-three-single w-100  mt-30">
                                                    <div class="products-three-single-img">
                                                        <router-link
                                                            :to="{name: 'products.show', params: {id: product.id}}"
                                                            class="d-block"><img
                                                            :src="product.product_images[0].url"
                                                            class="first-img" alt=""/> <img
                                                            :src="product.product_images[1] ? product.product_images[1].url : `/assets/images/home-three/productss2-hover-1.png`"
                                                            alt="" class="hover-img"/>
                                                        </router-link>
                                                        <div class="products-grid-one__badge-box"> <span
                                                            class="bg_base badge new ">New</span>
                                                        </div>
                                                        <a @click.prevent="addToCart(product, 1)" href="#"
                                                           class="addcart btn--primary style2">
                                                            Add To Cart </a>
                                                        <div class="products-grid__usefull-links">
                                                            <ul>
                                                                <li><a @click.prevent="addToWL(product)" href="#">
                                                                    <div :id="`like${product.id}`">
                                                                        <div>&#9734;</div><span>add to wishlist</span>
                                                                    </div>
                                                                </a></li>
                                                                <li><a href="#"> <i
                                                                    class="flaticon-left-and-right-arrows"></i>
                                                                    <span>
                                                                            compare</span> </a></li>
                                                                <li><a :href="`#popup${product.id}`" class="popup_link">
                                                                    <i
                                                                        class="flaticon-visibility"></i>
                                                                    <span> quick view</span>
                                                                </a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div :id="`popup${product.id}`"
                                                         class="product-gird__quick-view-popup mfp-hide">
                                                        <div class="container">
                                                            <div class="row justify-content-between align-items-center">
                                                                <div class="col-lg-6">
                                                                    <div class="quick-view__left-content">
                                                                        <div class="tabs">
                                                                            <div class="popup-product-thumb-box">
                                                                                <ul>
                                                                                    <li v-for="productImage in product.product_images"
                                                                                        class="tab-nav popup-product-thumb">
                                                                                        <a :href="`#tabb${productImage.id}`">
                                                                                            <img :src="productImage.url"
                                                                                                 alt=""/> </a></li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="popup-product-main-image-box">
                                                                                <div
                                                                                    v-for="productImage in product.product_images"
                                                                                    :id="`tabb${productImage.id}`"
                                                                                    class="tab-item popup-product-image">
                                                                                    <div
                                                                                        class="popup-product-single-image">
                                                                                        <img :src="productImage.url"
                                                                                             alt=""/></div>
                                                                                </div>
                                                                                <button class="prev"
                                                                                        v-if="product.product_images.length > 1">
                                                                                    <i
                                                                                        class="flaticon-back"></i>
                                                                                </button>
                                                                                <button class="next"
                                                                                        v-if="product.product_images.length > 1">
                                                                                    <i
                                                                                        class="flaticon-next"></i>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="popup-right-content">
                                                                        <h3>{{ product.title }}</h3>
                                                                        <div class="ratting"><i
                                                                            class="flaticon-star"></i> <i
                                                                            class="flaticon-star"></i> <i
                                                                            class="flaticon-star"></i>
                                                                            <i class="flaticon-star"></i> <i
                                                                                class="flaticon-star"></i>
                                                                            <span>(112)</span></div>
                                                                        <p class="text"> {{ product.description }}
                                                                        </p>
                                                                        <div class="price">
                                                                            <h2> ${{ product.price }} USD
                                                                                <del v-if="product.old_price>0">
                                                                                    ${{ product.old_price }} USD
                                                                                </del>
                                                                            </h2>
                                                                            <h6> In stuck</h6>
                                                                        </div>
                                                                        <div class="add-product">
                                                                            <h6>Qty:</h6>
                                                                            <div class="button-group">
                                                                                <div class="qtySelector text-center">
                                                                                    <span class="decreaseQty"><i
                                                                                        class="flaticon-minus"></i>
                                                                                    </span> <input type="number"
                                                                                                   class="qtyValue"
                                                                                                   value="1"/>
                                                                                    <span class="increaseQty"> <i
                                                                                        class="flaticon-plus"></i>
                                                                                    </span></div>
                                                                                <button
                                                                                    @click.prevent="addToCart(product, 999)"
                                                                                    class="btn--primary "> Add to
                                                                                    Cart
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="payment-method"><a href="#0"> <img
                                                                            src="/assets/images/payment_method/method_1.png"
                                                                            alt=""> </a>
                                                                            <a href="#0"> <img
                                                                                src="/assets/images/payment_method/method_2.png"
                                                                                alt=""> </a> <a href="#0"> <img
                                                                                src="/assets/images/payment_method/method_3.png"
                                                                                alt=""> </a>
                                                                            <a href="#0"> <img
                                                                                src="/assets/images/payment_method/method_4.png"
                                                                                alt=""> </a></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="products-three-single-content text-center"><span>{{
                                                            product.category.title
                                                        }}</span>
                                                        <h5>
                                                            <router-link
                                                                :to="{name: 'products.show', params: {id: product.id}}">
                                                                {{
                                                                    product.title
                                                                }}
                                                            </router-link>
                                                        </h5>
                                                        <p>
                                                            <del v-if="product.old_price>0">${{
                                                                    product.old_price
                                                                }}.00
                                                            </del>
                                                            ${{ product.price }}.00
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" v-if="pagination.last_page>1">
                            <div class="col-12 d-flex justify-content-center wow fadeInUp animated">
                                <ul class="pagination text-center">
                                    <li v-if="pagination.current_page !== 1" class="next">
                                        <a @click.prevent="getProducts(pagination.current_page - 1)" href="#0"><i
                                            class="flaticon-left-arrow-1" aria-hidden="true"></i> </a>
                                    </li>
                                    <li v-for="link in pagination.links">
                                        <template v-if="Number(link.label) && (pagination.current_page - link.label < 2 &&
                    pagination.current_page - link.label > -2) || Number(link.label) === 1 || Number(link.label) === pagination.last_page">
                                            <a @click.prevent="getProducts(link.label)"
                                               :class="link.active ? 'active' : ''"
                                               href="#0">{{ link.label }}</a>
                                        </template>
                                        <template
                                            v-if="Number(link.label) && pagination.current_page !==3 && (pagination.current_page - link.label === 2)">
                                            <a>...</a>
                                        </template>
                                        <template
                                            v-if="Number(link.label) && pagination.current_page !== (pagination.last_page-2) && (pagination.current_page - link.label === -2)">
                                            <a>...</a>
                                        </template>
                                    </li>
                                    <li v-if="pagination.current_page !== pagination.last_page" class="next">
                                        <a @click.prevent="getProducts(pagination.current_page + 1)" href="#0"><i
                                            class="flaticon-next-1"
                                            aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End product-grid-->
    </main>
</template>

<script>
export default {
    name: "Index",
    mounted() {
        $(document).trigger('changed')
        this.getProducts()
        this.getFilterList()
    },
    data() {
        return {
            products: [],
            popupProduct: null,
            filterList: [],
            categories: [],
            colors: [],
            prices: [],
            tags: [],
            sortingSelect: 2,
            pagination: [],
            wishList: [],
        }
    },
    methods: {
        drawWLicons() {
            const wishList = JSON.parse(localStorage.getItem('wishlist'));
            if (wishList)
            this.products.forEach(productInCart => {
                let returnVar = false;
                wishList.forEach(wishProduct => {
                    if (productInCart.id === wishProduct.id)
                        returnVar = true;
                })
                if (!returnVar) {
                    document.getElementById(`like${productInCart.id}`).innerHTML = '&#9734;<span>add to wishlist</span>';
                } else {
                    document.getElementById(`like${productInCart.id}`).innerHTML = '&#9733;<span>remove from wishlist</span>';
                }
            })
        },
        addToCart(product, qty) {
            let cart = localStorage.getItem('cart')
            if (qty === 999) {
                qty = $('.qtyValue').val()
                $('.qtyValue').val(1)
            }
            let newProduct = [{
                'id': product.id,
                'image_url': product.product_images[0].url,
                'title': product.title,
                'price': product.price,
                'qty': Number(qty)
            }];
            if (!cart) {
                localStorage.setItem('cart', JSON.stringify(newProduct))
            } else {
                cart = JSON.parse(cart)
                cart.forEach(productInCart => {
                    if (productInCart.id === product.id) {
                        productInCart.qty = Number(productInCart.qty) + Number(qty)
                        newProduct = null
                    }
                })
                Array.prototype.push.apply(cart, newProduct);
                localStorage.setItem('cart', JSON.stringify(cart))
            }
            this.$emit('addcart')
        },
        addToWL(product) {
            let wishList = localStorage.getItem('wishlist')
            let newProduct = [{
                'id': product.id
            }];
            if (!wishList) {
                localStorage.setItem('wishlist', JSON.stringify(newProduct))
            } else {
                wishList = JSON.parse(wishList)
                let i=0;
                wishList.forEach(productInCart => {
                    if (productInCart.id === product.id) {
                        wishList.splice(i,1)
                        newProduct = null
                    }
                    i++;
                })
                Array.prototype.push.apply(wishList, newProduct);
                localStorage.setItem('wishlist', JSON.stringify(wishList))
            }
            this.drawWLicons()
            this.$emit('addwl')
        },
        selectFilter() {
            switch (this.sortingSelect) {
                case '1':
                    this.products.sort((a, b) => (a.id > b.id) ? 1 : (b.id > a.id) ? -1 : 0)
                    break;
                case '2':
                    this.products.sort((a, b) => (a.title.toUpperCase() > b.title.toUpperCase()) ? 1 : (b.title.toUpperCase() > a.title.toUpperCase()) ? -1 : 0)
                    break;
                case '3':
                    this.products.sort((a, b) => (a.title.toUpperCase() > b.title.toUpperCase()) ? -1 : (b.title.toUpperCase() > a.title.toUpperCase()) ? 1 : 0)
                    break;
                case '4':
                    this.products.sort((a, b) => (a.price > b.price) ? 1 : (b.price > a.price) ? -1 : 0)
                    break;
                case '5':
                    this.products.sort((a, b) => (a.price > b.price) ? -1 : (b.price > a.price) ? 1 : 0)
                    break;
            }
        },
        addTag(id) {
            if (!this.tags.includes(id)) {
                this.tags.push(id)
                document.getElementById(`tagPicker${id}`).classList.add('li-selected');
            } else {
                this.tags = this.tags.filter(elem => {
                    return elem !== id
                })
                document.getElementById(`tagPicker${id}`).classList.remove('li-selected');
            }
        },
        addColor(id) {
            if (!this.colors.includes(id)) {
                this.colors.push(id)
                document.getElementById(`colorPicker${id}`).classList.remove('color-option-single');
                document.getElementById(`colorPicker${id}`).classList.add('color-option-single-selected');
            } else {
                this.colors = this.colors.filter(elem => {
                    return elem !== id
                })
                document.getElementById(`colorPicker${id}`).classList.add('color-option-single');
                document.getElementById(`colorPicker${id}`).classList.remove('color-option-single-selected');
            }
        },
        filterProducts() {
            let prices = $('#priceRange').val()
            this.prices = prices.replace(/[\s+]|[$]/g, '').split('-')
            this.getProducts()

        },
        getProducts(page = 1) {
            this.axios.post('/api/products', {
                'categories': this.categories,
                'colors': this.colors,
                'prices': this.prices,
                'tags': this.tags,
                'page': page
            })
                .then(res => {
                    this.products = res.data.data
                    this.pagination = res.data.meta
                }).finally(v => {
                this.drawWLicons();
                $(document).trigger('changed')
            })
        },
        getProduct(id) {
            this.axios.post(`/api/products/${id}`)
                .then(res => {
                    this.popupProduct = res.data.data
                }).finally(v => {
                $(document).trigger('changed')
            })
        },
        getFilterList() {
            this.axios.post(`/api/products/filters`)
                .then(res => {
                    this.filterList = res.data;


                    //  Price Filter
                    if ($("#price-range").length) {
                        $("#price-range").slider({
                            range: true,
                            min: this.filterList.price.min,
                            max: this.filterList.price.max,
                            values: [this.filterList.price.min, this.filterList.price.max],
                            slide: function (event, ui) {
                                $("#priceRange").val("$" + ui.values[0] + " - $" + ui.values[1]);
                            }
                        });
                        $("#priceRange").val("$" + $("#price-range").slider("values", 0) + " - $" + $("#price-range").slider("values", 1));
                    }
                    ;

                }).finally(v => {
                $(document).trigger('changed')
            })
        }
    }
}
</script>

<style scoped>

</style>
