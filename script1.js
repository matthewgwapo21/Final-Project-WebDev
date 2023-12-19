const url = 'https://real-time-product-search.p.rapidapi.com/search?q=Nike%20shoes&country=us&language=en&limit=30';
const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '5033f23870msh968221fad09fe47p13713cjsn6da252912e3e',
		'X-RapidAPI-Host': 'real-time-product-search.p.rapidapi.com'
	}
};

try {
    then(response => response.json())
    .then(data =>{
        const list = data.d;

        list.map((item) => {
            console.log(item);
        })
    })
} catch (error) {
	console.error(error);
}