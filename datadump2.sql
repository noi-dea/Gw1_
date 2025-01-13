INSERT INTO fotosets
(id)
VALUES
(19), (20), (21), (22), (23), (24), (25), (26), (27), (28),
(29), (30), (31), (32), (33), (34), (35), (36), (37), (38),
(39), (40), (41), (42), (43), (44), (45), (46), (47), (48),
(49), (50), (51), (52), (53), (54), (55), (56), (57), (58);


INSERT INTO cars
(id, makes_id, model, year, fueltype, colours_id, doors, transmission, price, mileage, bodywork_id, fotoUrl, fotosets_id, users_id)
VALUES
    (19, 7, "A4", 2020, "benzine", 2, 4, "automatisch", 30000, 20000, 2, "https://i.ytimg.com/vi/fm4hBI3Q_UY/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLDofWdHwP5XXgChTfahulOrafM_5g", 19, 2),
    (20, 7, "A3", 2021, "benzine", 3, 4, "automatisch", 28000, 15000, 2, "https://cdn.autotrack.nl/cdn-cgi/image/width=685/56369561/0-170ada5606def1ed168ffa0e809769ec.jpg", 20, 2),
    (21, 7, "Q5", 2022, "diesel", 4", 5, "automatisch", 45000, 12000, 3, "https://assets.autoweek.nl/m/834yqegbcxoj_800.jpg", 21, 2),
    (22, 7, "Q7", 2021, "benzine", 1", 5, "automatisch", 60000, 10000, 3, "https://hips.hearstapps.com/hmg-prod/images/2021-audi-q7-mmp-1-1591218923.jpg?crop=0.798xw:0.673xh;0.0417xw,0.327xh&resize=2048:*", 22, 2),
    (23, 7, "A6", 2020, "diesel", 5, 4, "automatisch", 40000, 20000, 2, "https://static.moniteurautomobile.be/imgcontrol/images_tmp/clients/moniteur/c680-d465/content/medias/images/cars/audi/a6/audi--a6-avant--2020/audi--a6-avant--2020-m-1.jpg", 23, 2),
    (24, 7, "A7", 2021, "benzine", 6", 4, "automatisch", 50000, 12000, 5, "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQKgQfd3WvvglZI3_D0TnL5DIB7fFXA_YModA&s", 24, 2),
    (25, 7, "TT", 2022, "benzine", 8, 2, "handmatig", 35000, 8000, 5, "https://assets.autoweek.nl/m/1d4yh42bsjpn_800.jpg", 25, 2),
    (26, 7, "R8", 2022, "benzine", 1", 2, "automatisch", 100000, 5000, 8, "https://www.exclusiveautomotivegroup.com/imagetag/3920/main/l/Used-2022-Audi-R8-SPYDER-V10-PERFORMANCE-QUATTRO-1707582735.jpg", 26, 2),
    (27, 7, "Q3", 2020, "diesel", 7", 5, "automatisch", 35000, 20000, 3, "https://cdn-storage-02.prod.gocar.be/news/media/1945399/RSQ3-2.jpg?width=840", 27, 2),
    (28, 7, "RS5", 2021, "benzine", 2, 4, "automatisch", 70000, 10000, 5, "https://i.ytimg.com/vi/2ipcPFxgwT8/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCpJr4U21FPzftNv_X-1hId2k61SQ", 28, 2),
    (29, 5, "X5", 2021, "diesel", 1, 5, "automatisch", 55000, 15000, 3, "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzJXhPecm2Wb4ZdmSQAtPCuyGUZgO0cdulGA&s", 29, 2),
    (30, 5, "3 Series", 2020, "benzine", 3, 4, "automatisch", 45000, 20000, 2, "https://renty.ae/uploads/car/photos/l/silver_-bmw-i-silver-with-mi-bodykit_2020_13672_0e8890801538b849cb7f06813a827635.jpg", 30, 2),
    (31, 5, "X3", 2021, "diesel", 2, 5, "automatisch", 48000, 18000, 3, "https://example.com/bmw_x3.jpg", 31, 2),
    (32, 5, "4 Series", 2021, "benzine", 6, 4, "automatisch", 50000, 12000, 5, "https://example.com/bmw_4series.jpg", 32, 2),
    (33, 5, "M5", 2021, "benzine", 5, 4, "automatisch", 70000, 10000, 2, "https://example.com/bmw_m5.jpg", 33, 2),
    (34, 5, "7 Series", 2020, "diesel", 4, 4, "automatisch", 75000, 12000, 2, "https://example.com/bmw_7series.jpg", 34, 2),
    (35, 5, "i3", 2021, "elektrisch", 8, 5, "automatisch", 45000, 15000, 1, "https://example.com/bmw_i3.jpg", 35, 2),
    (36, 5, "X7", 2021, "diesel", 7, 5, "automatisch", 80000, 13000, 3, "https://example.com/bmw_x7.jpg", 36, 2),
    (37, 5, "Z4", 2021, "benzine", 7, 2, "handmatig", 60000, 10000, 6, "https://example.com/bmw_z4.jpg", 37, 2),
    (38, 5, "X1", 2020, "diesel", 3, 5, "automatisch", 40000, 25000, 3, "https://example.com/bmw_x1.jpg", 38, 2),
    (39, 4, "Malibu", 2019, "benzine", 3, 4, "automatisch", 19000, 30000, 2, "https://example.com/chevrolet_malibu.jpg", 39, 2),
    (40, 4, "Equinox", 2020, "diesel", 6, 5, "automatisch", 25000, 22000, 3, "https://example.com/chevrolet_equinox.jpg", 40, 2),
    (41, 4, "Traverse", 2021, "benzine", 5, 5, "automatisch", 35000, 15000, 3, "https://example.com/chevrolet_traverse.jpg", 41, 2),
    (42, 4, "Spark", 2020, "elektrisch", 8, 4, "automatisch", 18000, 12000, 1, "https://example.com/chevrolet_spark.jpg", 42, 2),
    (43, 4, "Silverado", 2021, "diesel", 7, 4, "handmatig", 40000, 20000, 7, "https://example.com/chevrolet_silverado.jpg", 43, 2),
    (44, 4, "Camaro", 2020, "benzine", 2, 2, "handmatig", 35000, 10000, 5, "https://example.com/chevrolet_camaro.jpg", 44, 2),
    (45, 4, "Bolt EV", 2021, "elektrisch", 5, 4, "automatisch", 30000, 5000, 1, "https://example.com/chevrolet_boltev.jpg", 45, 2),
    (46, 4, "Tahoe", 2020, "diesel", 10, 5, "automatisch", 60000, 15000, 3, "https://example.com/chevrolet_tahoe.jpg", 46, 2),
    (47, 4, "Colorado", 2021, "benzine", 1, 4, "automatisch", 35000, 18000, 7, "https://example.com/chevrolet_colorado.jpg", 47, 2),
    (48, 4, "Impala", 2020, "benzine", 3, 4, "automatisch", 25000, 25000, 2, "https://example.com/chevrolet_impala.jpg", 48, 2),
    (49, 15, "Pacifica", 2020, "benzine", 6, 5, "automatisch", 28000, 18000, 8, "https://example.com/chrysler_pacifica.jpg", 49, 2),
    (50, 15, "300", 2021, "benzine", 3, 4, "automatisch", 35000, 15000, 2, "https://example.com/chrysler_300.jpg", 50, 2),
    (51, 15, "Voyager", 2020, "diesel", 1, 5, "automatisch", 32000, 22000, 8, "https://example.com/chrysler_voyager.jpg", 51, 2),
    (52, 15, "Pacifica hybrid", 2021, "hybride", 5, 5, "automatisch", 38000, 12000, 8, "https://example.com/chrysler_pacifica_hybride.jpg", 52, 2),
    (53, 15, "300C", 2021, "benzine", 4, 4, "automatisch", 42000, 10000, 2, "https://example.com/chrysler_300c.jpg", 53, 2),
    (54, 15, "Saratoga", 2020, "benzine", 7, 4, "automatisch", 31000, 23000, 2, "https://example.com/chrysler_saratoga.jpg", 54, 2),
    (55, 15, "Aspen", 2021, "benzine", 8, 5, "automatisch", 40000, 15000, 3, "https://example.com/chrysler_aspen.jpg", 55, 2),
    (56, 15, "Newport", 2021, "benzine", 10, 4, "automatisch", 37000, 14000, 2, "https://example.com/chrysler_newport.jpg", 56, 2),
    (57, 15, "Town & Country", 2020, "diesel", 4, 5, "automatisch", 33000, 18000, 8, "https://example.com/chrysler_towncountry.jpg", 57, 2),
    (58, 15, "Imperial", 2021, "benzine", 2, 4, "automatisch", 60000, 12000, 2, "https://example.com/chrysler_imperial.jpg", 58, 2);