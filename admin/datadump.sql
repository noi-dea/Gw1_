INSERT INTO users
(id, username, password, firstname, lastname, email, district, street, postalcode, housenumber, bus, isAdmin)
VALUES
(1, 'W.Harper', md5('AdminPass-01'), 'William', 'Harper', 'wilper@hotmail.com', 'Herentals', 'nietbestaandestraat', 2200, 5, 2, 1);

INSERT INTO fotosets
(id, front, back, `inner`)
VALUES
(1, 'https://cdn-storage-02.prod.gocar.be/vehicles/24/12/2637189/4482837-o9i.jpg?width=840', 'https://images.cars.com/cldstatic/wp-content/uploads/36-toyota-corolla-2020-angle--exterior--rear--red.jpg', 'https://images.carpages.ca/inventory/10784618.387580098?w=640&h=480&q=75&s=41f8827ed7a38950c4820a2fdab9754c'),
(2, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaPg3KIjeYYujbTBRe5T-baeoBwK6Poa2UcQ&s', 'https://vicimus-glovebox7.s3.us-east-2.amazonaws.com/photos/ClarHon9q4/2HGFC2F79MH006223/52d98861b50e8a7a406fed4794b44abe.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlKLqkPtWzAXSBc8KCy77lj2gp3-gzi3mBpw&s'),
(3, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdiwNov5BC9loV_xfF-DrcjB_oRWLfZI0Ltw&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQf_9CqPIXIHOBSNzuo1KF2YVDBITfk8Jk7Lg&s', 'https://www.saxton4x4.co.uk/uploads/images/vehicles/large/HH_WBSKT620400C95776241015162302_SEATF.jpg'),
(4, 'https://assets.autoweek.nl/m/h3syc3lbr5bj.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSl28R9foQouRMqwADag8f58EgeJADJrW5Vng&s', 'https://www.vmcdn.ca/f/files/guelphtoday/spotlight-photos/millburns-auto/fc-2019-ford-mustang/ford-mustang-2019-7.jpg;w=960'),
(5, 'https://www.nardocar.se/images/produkter/maxton/9-1-18219_5-p.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxufhiMpNwUvufQqjtYyy94DVWVriyy5Ua-w&s', 'https://images.carexpert.com.au/resize/3000/-/app/uploads/2021/10/2022-Audi-A4-45-TFSI-quattro-S-line-review-36.jpeg'),
(6, 'https://inv.assets.sincrod.com/6/8/1/33282044186.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRkfYrl3BhO48W9P8j1GVfrDhozhnRzTpZFWw&s', 'https://hips.hearstapps.com/hmg-prod/images/2020-chevrolet-traverse-mmp-3-1571681068.png?crop=0.818xw:1.00xh;0.0221xw,0&resize=980:*');

INSERT INTO fotosets
(id)
VALUES
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18);

INSERT INTO cars
(makes_id, model, year, fueltype, colours_id, doors, transmission, price, mileage, bodywork_id, fotoUrl, fotosets_id, users_id)
VALUES
(1, 'Corolla', 2020, 'benzine', 6, 4, 'automatisch', 20000.00, 35000, 2, 'https://i.ytimg.com/vi/VCipbiMnscg/maxresdefault.jpg', 1, 1),
(3, 'Civic', 2021, 'benzine', 5, 4, 'handmatig', 22500.00, 25000, 2, 'https://autoimage.capitalone.com/dealer/2021-Honda-Civic-EX-L-19XFC1F75ME004313-DealercomFeed_19XFC1F75ME004313_vandergriffhondavtg-32b2fd8cb0774dcaa204b7d812c5d077.jpg', 2, 1),
(5, 'X5', 2018, 'diesel', 2, 5, 'automatisch', 40000.00, 50000, 3, 'https://www.exoticmotorsportsok.com/imagetag/1291/2/l/Used-2018-BMW-X5-M-1667272643.jpg', 3, 1),
(2, 'Mustang', 2019, 'benzine', 8, 2, 'handmatig', 28000.00, 18000, 5, 'https://www.instant-quote.co/images/cars/large/o_1gpptdr0k1i35c99ur91e131qr91i.jpg', 4, 1),
(7, 'A4', 2022, 'benzine', 1, 4, 'automatisch', 30000.00, 15000, 2, 'https://i.ytimg.com/vi/ev8CR5YyuOw/hq720.jpg', 5, 1),
(4, 'Traverse', 2020, 'benzine', 3, 4, 'automatisch', 35000.00, 40000, 3, 'https://pictures.dealer.com/u/unitychevrolet/0264/4007413120bd616b0683203f3caf5d45x.jpg', 6, 1),
(6, 'C-Class', 2021, 'benzine', 4, 4, 'automatisch', 38000.00, 20000, 2, 'https://cdn.ebizautos.media/used-2021-mercedes~benz-c~class-c3004maticsedan-13470-22445149-1-1024.jpg', 7, 1),
(8, 'Rogue', 2022, 'hybride', 10, 5, 'automatisch', 32000.00, 10000, 3, 'https://www.cnet.com/a/img/1426ff1827f332339ed99b0f8abc61cb5cda8015/hub/2022/08/02/6efb5cb4-cd65-4443-8c99-10c4c220dbaf/2022-nissan-rogue-001.jpg', 8, 1),
(9, 'Elantra', 2020, 'benzine', 5, 4, 'automatisch', 18500.00, 45000, 2, 'https://cf-img.autorevo.com/2020-hyundai-elantra-san-antonio-tx-7111885/980x980/2711144-1-revo.jpg', 9, 1),
(10, 'Golf', 2021, 'diesel', 1, 5, 'handmatig', 23000, 22000.00, 1, 'https://images.clickdealer.co.uk/vehicles/6307/6307915/large1/149731561.jpg', 10, 1),
(12, 'Outback', 2020, 'hybride', 7, 5, 'automatisch', 33000.00, 25000, 3, 'https://pictures.dealer.com/t/tomwoodvinfast/0518/23ed31efafe3127543a0b9f2711a7c3bx.jpg', 11, 1),
(13, 'Sportage', 2022, 'benzine', 3, 5, 'automatisch', 27500.00, 15000, 3, 'https://pictures.dealer.com/m/michigancitykia/1720/869f6b229d4537c6a0bcc584c8b54bedx.jpg', 12, 1),
(2, 'F-150', 2019, 'diesel', 2, 4, 'automatisch', 35500.00, 40000, 7, 'https://i.ytimg.com/vi/iS512sFWc-U/maxresdefault.jpg', 13, 1),
(4, 'Camaro', 2020, 'benzine', 8, 2, 'handmatig', 32000.00, 22000, 5, 'https://cdn05.carsforsale.com/75d484748e030e085fb3aa425e1ebce0/2020-chevrolet-camaro-ss.jpg?width=640&height=480&sig=9ff18d43b10d8386', 14, 1),
(3, 'Accord', 2021, 'hybride', 1, 4, 'automatisch', 27000.00, 18000, 2, 'https://content.homenetiol.com/2000292/2143540/0x0/5c38894fcb264887b8b97a6b94b915a1.jpg', 15, 1),
(1, 'Tacoma', 2021, 'benzine', 10, 4, 'automatisch', 36000.00, 30000, 7, 'https://www.usnews.com/object/image/00000184-0a72-d221-abce-ba77db2d0001/2023-toyota-tacoma-trd-pro-exterior-2.jpg', 16, 1),
(15, 'Pacifica', 2020, 'benzine', 4, 5, 'automatisch', 28000.00, 35000, 8, 'https://hips.hearstapps.com/amv-prod-cad-assets.s3.amazonaws.com/vdat/submodels/chrysler_pacifica_chrysler-pacifica_2020-1636564884153.jpg', 17, 1),
(14, 'Wrangler', 2018, 'benzine', 7, 4, 'handmatig', 31000.00, 50000, 3, 'https://pictures.dealer.com/c/charlieswholesale/1155/9184b0ce84b53921fa000656758deb56x.jpg', 18, 1);