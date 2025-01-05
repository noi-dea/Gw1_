INSERT INTO users
(id, username, password, firstname, lastname, email, district, street, postalcode, housenumber, bus, isAdmin)
VALUES
(1, 'W.Harper', md5('AdminPass-01'), 'William', 'Harper', 'wilper@hotmail.com', 'Herentals', 'nietbestaandestraat', 2200, 5, 2, 1);

INSERT INTO fotosets
(id)
VALUES
(1),
(2),
(3),
(4),
(5),
(6),
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