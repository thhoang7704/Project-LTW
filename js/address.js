document.addEventListener('DOMContentLoaded', () => {
const provinces = [
    {
        name:'TP Hồ Chí Minh',
        districts: [
            {
                name:'Quận 1' , wards: [ { name:'Bến nghé'},{ name:'Bến Thành'},{ name:'Cô Giang'},{ name:'Cầu kho'},{ name:'Cầu Ông Lãnh'},{ name:'Đa Kao'},{ name:'Nguyễn Cư Trinh'},{ name:'Nguyễn Thái Bình'},{ name:'Phạm Ngũ Lão'},{ name:'Tân Định'}]
            },
            {
                name:'Quận 3', wards: [{ name:'Võ Thị Sáu'},{ name:'Phường 2'},{ name:'Phường 3'},{ name:'Phường 4'},{ name:'Phường 5'},{ name:'Phường 6'},{ name:'Phường 7'},{ name:'Phường 8'},{ name:'Phường 9'},{ name:'Phường 10'},{ name:'Phường 11'},{ name:'Phường 12'},{ name:'Phường 13'},{ name:'Phường 14'}]
            },
            {
                name:'Quận 4', wards: [{ name:'Phường 1'},{ name:'Phường 2'},{ name:'Phường 3'},{ name:'Phường 4'},{ name:'Phường 5'},{ name:'Phường 6'},{ name:'Phường 8'},{ name:'Phường 9'},{ name:'Phường 10'},{ name:'Phường 12'},{ name:'Phường 13'},{ name:'Phường 14'},{ name:'Phường 15'},{ name:'Phường 16'},{ name:'Phường 18'}]
            },
            {
                name:'Quận 5', wards: [{ name:'Phường 1'},{ name:'Phường 2'},{ name:'Phường 3'},{ name:'Phường 4'},{ name:'Phường 5'},{ name:'Phường 6'},{ name:'Phường 7'},{ name:'Phường 8'},{ name:'Phường 9'},{ name:'Phường 10'}, { name:'Phường 11'},{ name:'Phường 12'},{ name:'Phường 13'},{ name:'Phường 14'},{ name:'Phường 15'}]
            },
            {
                name:'Quận 6', wards: [{ name:'Phường 1'},{ name:'Phường 2'},{ name:'Phường 3'},{ name:'Phường 4'},{ name:'Phường 5'},{ name:'Phường 6'},{ name:'Phường 7'},{ name:'Phường 8'},{ name:'Phường 9'},{ name:'Phường 10'}, { name:'Phường 11'},{ name:'Phường 12'},{ name:'Phường 13'},{ name:'Phường 14'}]
            },
            {
                name:'Quận 7' , wards: [ { name:'Tân Phú'},{ name:'Tân Thuận Đông'},{ name:'Tân Thuận Tây'},{ name:'Bình Thuận'},{ name:'Tân kiểng'},{ name:'Tân Hưng'},{ name:'Tân Quy'},{ name:'Tân Phong'},{ name:'Phú Thuận'},{ name:'Phú Mỹ'}]
            },
            {
                name:'Quận 8', wards: [{ name:'Phường 1'},{ name:'Phường 2'},{ name:'Phường 3'},{ name:'Phường 4'},{ name:'Phường 5'},{ name:'Phường 6'},{ name:'Phường 7'},{ name:'Phường 8'},{ name:'Phường 9'},{ name:'Phường 10'}, { name:'Phường 11'},{ name:'Phường 12'},{ name:'Phường 13'},{ name:'Phường 14'},{ name:'Phường 15'},{ name:'Phường 16'}]
            },
            {
                name:'Quận 10', wards: [
                    { name:'Phường 1'},
                    { name:'Phường 2'},
                    { name:'Phường 3'},
                    { name:'Phường 4'},
                    { name:'Phường 5'},
                    { name:'Phường 6'},
                    { name:'Phường 7'},
                    { name:'Phường 8'},
                    { name:'Phường 9'},
                    { name:'Phường 10'},
                    { name:'Phường 11'},
                    { name:'Phường 12'},
                    { name:'Phường 13'},
                    { name:'Phường 14'},
                    { name:'Phường 15'}
                ]
            },
            {
                name:'Quận 11', wards: [
                    { name:'Phường 1'},
                    { name:'Phường 2'},
                    { name:'Phường 3'},
                    { name:'Phường 4'},
                    { name:'Phường 5'},
                    { name:'Phường 6'},
                    { name:'Phường 7'},
                    { name:'Phường 8'},
                    { name:'Phường 9'},
                    { name:'Phường 10'},
                    { name:'Phường 11'},
                    { name:'Phường 12'},
                    { name:'Phường 13'},
                    { name:'Phường 14'},
                    { name:'Phường 15'},
                    { name:'Phường 16'}
                ]
            },
            {
                name:'Quận 12', wards: [
                    { name:'An Phú Đông'},
                    { name:'Đông Hưng Thuận'},
                    { name:'Hiệp Thành'},
                    { name:'Tân Chánh Hiệp'},
                    { name:'Tân Hưng Thuận'},
                    { name:'Tân Thới Hiệp'},
                    { name:'Tân Thới Nhất'},
                    { name:'Thạnh Lộc'},
                    { name:'Thạnh Xuân'},
                    { name:'Thới An'},
                    { name:'Trung Mỹ Tây'}
                ]
            },
            {
                name:'Quận Bình Tân', wards: [
                    { name:'An Lạc'},
                    { name:'An Lạc A'},
                    { name:'Bình Hưng Hòa'},
                    { name:'Bình Hưng Hòa A'},
                    { name:'Bình Hưng Hòa B'},
                    { name:'Bình Trị Đông'},
                    { name:'Bình Trị Đông A'},
                    { name:'Bình Trị Đông B'},
                    { name:'Tân Tạo'},
                    { name:'Tân Tạo A'}
                ]
            },
            {
                name:'Quận Bình Thạnh', wards: [
                    { name:'Phường 1'},
                    { name:'Phường 2'},
                    { name:'Phường 3'},
                    { name:'Phường 5'},
                    { name:'Phường 6'},
                    { name:'Phường 7'},
                    { name:'Phường 11'},
                    { name:'Phường 12'},
                    { name:'Phường 13'},
                    { name:'Phường 14'},
                    { name:'Phường 15'},
                    { name:'Phường 17'},
                    { name:'Phường 19'},
                    { name:'Phường 21'},
                    { name:'Phường 22'},
                    { name:'Phường 24'},
                    { name:'Phường 25'},
                    { name:'Phường 26'},
                    { name:'Phường 27'},
                    { name:'Phường 28'}
                ]
            },
            {
                name:'Quận Gò Vấp', wards: [
                    { name:'Phường 1'},
                    { name:'Phường 3'},
                    { name:'Phường 4'},
                    { name:'Phường 5'},
                    { name:'Phường 6'},
                    { name:'Phường 7'},
                    { name:'Phường 8'},
                    { name:'Phường 9'},
                    { name:'Phường 10'},
                    { name:'Phường 11'},
                    { name:'Phường 12'},
                    { name:'Phường 13'},
                    { name:'Phường 14'},
                    { name:'Phường 15'},
                    { name:'Phường 16'},
                    { name:'Phường 17'}
                ]
            },
            {
                name:'Quận Phú Nhuận', wards: [
                    { name:'Phường 1'},
                    { name:'Phường 2'},
                    { name:'Phường 3'},
                    { name:'Phường 4'},
                    { name:'Phường 5'},
                    { name:'Phường 7'},
                    { name:'Phường 8'},
                    { name:'Phường 9'},
                    { name:'Phường 10'},
                    { name:'Phường 11'},
                    { name:'Phường 12'},
                    { name:'Phường 13'},
                    { name:'Phường 14'},
                    { name:'Phường 15'},
                    { name:'Phường 17'}
                ]
            },
            {
                name:'Quận Tân Bình', wards: [
                    { name:'Phường 1'},
                    { name:'Phường 2'},
                    { name:'Phường 3'},
                    { name:'Phường 4'},
                    { name:'Phường 5'},
                    { name:'Phường 6'},
                    { name:'Phường 7'},
                    { name:'Phường 8'},
                    { name:'Phường 9'},
                    { name:'Phường 10'},
                    { name:'Phường 11'},
                    { name:'Phường 12'},
                    { name:'Phường 13'},
                    { name:'Phường 14'},
                    { name:'Phường 15'}
                ]
            },
            {
                name:'Quận Tân Phú', wards: [
                    { name:'Hiệp Tân'},
                    { name:'Hòa Thạnh'},
                    { name:'Phú Thạnh'},
                    { name:'Phú Thọ Hòa'},
                    { name:'Phú Trung'},
                    { name:'Sơn Kỳ'},
                    { name:'Tân Quý'},
                    { name:'Tân Sơn Nhì'},
                    { name:'Tân Thành'},
                    { name:'Tân Thới Hòa'},
                    { name:'Tây Thạnh'}
                ]
            },
            {
                name:'Quận Thủ Đức', wards: [
                    { name:'Bình Chiểu'},
                    { name:'Bình Thọ'},
                    { name:'Hiệp Bình Chánh'},
                    { name:'Hiệp Bình Phước'},
                    { name:'Linh Chiểu'},
                    { name:'Linh Đông'},
                    { name:'Linh Tây'},
                    { name:'Linh Trung'},
                    { name:'Linh Xuân'},
                    { name:'Tam Bình'},
                    { name:'Tam Phú'},
                    { name:'Trường Thọ'}
                ]
            },
            {
                name:'Thành phố Thủ Đức', wards: [
                    { name:'An Khánh'},
                    { name:'An Lợi Đông'},
                    { name:'An Phú'},
                    { name:'Bình Chiểu'},
                    { name:'Bình Thọ'},
                    { name:'Cát Lái'},
                    { name:'Hiệp Bình Chánh'},
                    { name:'Hiệp Bình Phước'},
                    { name:'Hiệp Phú'},
                    { name:'Linh Chiểu'},
                    { name:'Linh Đông'},
                    { name:'Linh Tây'},
                    { name:'Linh Trung'},
                    { name:'Linh Xuân'},
                    { name:'Long Bình'},
                    { name:'Long Phước'},
                    { name:'Long Thạnh Mỹ'},
                    { name:'Long Trường'},
                    { name:'Phước Bình'},
                    { name:'Phước Long A'},
                    { name:'Phước Long B'},
                    { name:'Tam Bình'},
                    { name:'Tam Phú'},
                    { name:'Thạnh Mỹ Lợi'},
                    { name:'Thảo Điền'},
                    { name:'Thủ Thiêm'},
                    { name:'Trường Thọ'}
                ]
            },
            {
                name:'Huyện Bình Chánh', wards: [
                    { name:'An Phú Tây'},
                    { name:'Bình Chánh'},
                    { name:'Bình Hưng'},
                    { name:'Bình Lợi'},
                    { name:'Đa Phước'},
                    { name:'Hưng Long'},
                    { name:'Lê Minh Xuân'},
                    { name:'Phạm Văn Hai'},
                    { name:'Phong Phú'},
                    { name:'Quy Đức'},
                    { name:'Tân Kiên'},
                    { name:'Tân Nhựt'},
                    { name:'Tân Quý Tây'},
                    { name:'Vĩnh Lộc A'},
                    { name:'Vĩnh Lộc B'}
                ]
            },
            {
                name:'Huyện Cần Giờ', wards: [
                    { name:'An Thới Đông'},
                    { name:'Bình Khánh'},
                    { name:'Cần Thạnh'},
                    { name:'Long Hòa'},
                    { name:'Lý Nhơn'},
                    { name:'Tam Thôn Hiệp'},
                    { name:'Thạnh An'}
                ]
            },
            {
                name:'Huyện Củ Chi', wards: [
                    { name:'An Nhơn Tây'},
                    { name:'An Phú'},
                    { name:'Bình Mỹ'},
                    { name:'Hòa Phú'},
                    { name:'Nhuận Đức'},
                    { name:'Phạm Văn Cội'},
                    { name:'Phú Hòa Đông'},
                    { name:'Phú Mỹ Hưng'},
                    { name:'Phước Hiệp'},
                    { name:'Phước Thạnh'},
                    { name:'Phước Vĩnh An'},
                    { name:'Tân An Hội'},
                    { name:'Tân Phú Trung'},
                    { name:'Tân Thạnh Đông'},
                    { name:'Tân Thạnh Tây'},
                    { name:'Tân Thông Hội'},
                    { name:'Thái Mỹ'},
                    { name:'Trung An'},
                    { name:'Trung Lập Hạ'},
                    { name:'Trung Lập Thượng'}
                ]
            },
            {
                name:'Huyện Hóc Môn', wards: [
                    { name:'Bà Điểm'},
                    { name:'Đông Thạnh'},
                    { name:'Nhị Bình'},
                    { name:'Tân Hiệp'},
                    { name:'Tân Thới Nhì'},
                    { name:'Tân Xuân'},
                    { name:'Thới Tam Thôn'},
                    { name:'Trung Chánh'},
                    { name:'Xuân Thới Đông'},
                    { name:'Xuân Thới Sơn'},
                    { name:'Xuân Thới Thượng'}
                ]
            },
            {
                name:'Huyện Nhà Bè', wards: [
                    { name:'Hiệp Phước'},
                    { name:'Long Thới'},
                    { name:'Nhơn Đức'},
                    { name:'Phú Xuân'},
                    { name:'Phước Kiển'},
                    { name:'Phước Lộc'}
                ]
            }
        ]  
    }
]

const provinceSelect = document.getElementById('shipping_province')
const districtSelect = document.getElementById('shipping_district')
const wardSelect = document.getElementById('shipping_ward')
provinces.forEach(province => {
    const option = document.createElement('option');
    option.value = province.name

    option.textContent = province.name

    provinceSelect.appendChild(option)
})
provinceSelect.addEventListener('change', () => {
    const selectedProvince = provinces.find(p => p.name == provinceSelect.value)
    districtSelect.disabled = false;
    districtSelect.innerHTML = '<option value="">Chọn quận/huyện</option>';
    wardSelect.innerHTML = '<option value="">Chọn phường/xã</option>'; 
    if (selectedProvince) {
        // Lấy danh sách các quận/huyện và cập nhật vào districtSelect
        selectedProvince.districts.forEach(district => {
          const option = document.createElement('option');
          option.value = district.name;
          option.textContent = district.name;
          districtSelect.appendChild(option); 
    
        });
      }
})
districtSelect.addEventListener('change', () => {
    const selectedProvince = provinces.find(p => p.name === provinceSelect.value);
    wardSelect.disabled = false;
    wardSelect.innerHTML = '<option value="">Chọn phường/xã</option>';
    if (selectedProvince) {
      const selectedDistrict = selectedProvince.districts.find(d => d.name === districtSelect.value);
      if (selectedDistrict) {
        selectedDistrict.wards.forEach(ward => {
          const option = document.createElement('option');
          option.value = ward.name;
          option.textContent = ward.name;
          wardSelect.appendChild(option);
        });
      }
    }
  });
})

