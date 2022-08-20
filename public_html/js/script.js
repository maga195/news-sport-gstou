$(document).ready(function () {
	$('.fa-bars').click(function () {
		$('.sidebar').toggle();
	});

	$("#search").keyup(function () {
		var value = this.value;

		$("table").find("tr").each(function (index) {
			if (!index) return;
			var id = $(this).find("td").text();
			$(this).toggle(id.indexOf(value) !== -1);
		});
	});
	function translit(str){
		var ru=("А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я").split("-")
		var en=("A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya").split("-")
			var res = '';
		for(var i=0, l=str.length; i<l; i++)
		{
			var s = str.charAt(i), n = ru.indexOf(s);
			if(n >= 0) { res += en[n]; }
			else { res += s; }
		}
			return Date.now() +'-' + res.substr(0,50);
	}
	function slugify(text) {
		var text_rep = text.toString().toLowerCase();
		return translit(text_rep)
				.replace(/\s+/g, '-')
				.replace(/[^\w\-]+/g, '')
				.replace(/\-\-+/g, '-')
				.replace(/^-+/, '')
				.replace(/-+$/, '');


		// return text.toString().toLowerCase()
		// 	.replace(/\s+/g, '-')           // Replace spaces with -
		// 	.replace(/[^\w\-]+/g, '')       // Remove all non-word chars
		// 	.replace(/\-\-+/g, '-')         // Replace multiple - with single -
		// 	.replace(/^-+/, '')             // Trim - from start of text
		// 	.replace(/-+$/, '');            // Trim - from end of text
	}
	function slugifyNav(text) {
		var text_rep = text.toString().toLowerCase();
		return translit(text_rep)
				.replace(/[0-9]/g, '')
				.replace(/\s+/g, '-')
				.replace(/[^\w\-]+/g, '')
				.replace(/\-\-+/g, '-')
				.replace(/^-+/, '')
				.replace(/-+$/, '')



		// return text.toString().toLowerCase()
		// 	.replace(/\s+/g, '-')           // Replace spaces with -
		// 	.replace(/[^\w\-]+/g, '')       // Remove all non-word chars
		// 	.replace(/\-\-+/g, '-')         // Replace multiple - with single -
		// 	.replace(/^-+/, '')             // Trim - from start of text
		// 	.replace(/-+$/, '');            // Trim - from end of text
	}

	$('#category_name').keyup(function () {
		var slug = $(this).val();
		$('#slug-nav').val(slugifyNav(slug));
	});

	$('#post_title').keyup(function () {
		var slug = $(this).val();
		$('#slug').val(slugify(slug));
	});

	$('#video_title').keyup(function () {
		var slug = $(this).val();
		$('#slug-video').val(slugify(slug));
	});

	$('#select-all').click(function (event) {
		if (this.checked) {
			$(':checkbox').each(function () {
				this.checked = true;
			});
		} else {
			$(':checkbox').each(function () {
				this.checked = false;
			});
		}
	});

	var list = document.getElementById("my-ui-list");
	Sortable.create(list);

});