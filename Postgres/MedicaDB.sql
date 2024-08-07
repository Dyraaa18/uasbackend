PGDMP                      |            MedicaDB    16.3    16.2 \    _           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            `           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            a           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            b           1262    16398    MedicaDB    DATABASE     �   CREATE DATABASE "MedicaDB" WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_Indonesia.1252';
    DROP DATABASE "MedicaDB";
                postgres    false            �            1259    16449    admins    TABLE     y  CREATE TABLE public.admins (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.admins;
       public         heap    postgres    false            �            1259    16448    admins_id_seq    SEQUENCE     v   CREATE SEQUENCE public.admins_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.admins_id_seq;
       public          postgres    false    225            c           0    0    admins_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.admins_id_seq OWNED BY public.admins.id;
          public          postgres    false    224            �            1259    16510    antrians    TABLE     u  CREATE TABLE public.antrians (
    id bigint NOT NULL,
    nama character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    telepon character varying(255) NOT NULL,
    poli_id bigint NOT NULL,
    tanggal date NOT NULL,
    nomor_antrian integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.antrians;
       public         heap    postgres    false            �            1259    16509    antrians_id_seq    SEQUENCE     x   CREATE SEQUENCE public.antrians_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.antrians_id_seq;
       public          postgres    false    237            d           0    0    antrians_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.antrians_id_seq OWNED BY public.antrians.id;
          public          postgres    false    236            �            1259    16460    bookings    TABLE     a  CREATE TABLE public.bookings (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    date date NOT NULL,
    tenaga_kerja character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.bookings;
       public         heap    postgres    false            �            1259    16459    bookings_id_seq    SEQUENCE     x   CREATE SEQUENCE public.bookings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.bookings_id_seq;
       public          postgres    false    227            e           0    0    bookings_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.bookings_id_seq OWNED BY public.bookings.id;
          public          postgres    false    226            �            1259    16469    doctors    TABLE     �  CREATE TABLE public.doctors (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    specialization character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    image character varying(255),
    address character varying(255),
    working_hours character varying(255)
);
    DROP TABLE public.doctors;
       public         heap    postgres    false            �            1259    16468    doctors_id_seq    SEQUENCE     w   CREATE SEQUENCE public.doctors_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.doctors_id_seq;
       public          postgres    false    229            f           0    0    doctors_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.doctors_id_seq OWNED BY public.doctors.id;
          public          postgres    false    228            �            1259    16425    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false            �            1259    16424    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    221            g           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    220            �            1259    16480 	   medicines    TABLE     @  CREATE TABLE public.medicines (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    description text NOT NULL,
    stock integer NOT NULL,
    price numeric(8,2) NOT NULL,
    image character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.medicines;
       public         heap    postgres    false            �            1259    16479    medicines_id_seq    SEQUENCE     y   CREATE SEQUENCE public.medicines_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.medicines_id_seq;
       public          postgres    false    231            h           0    0    medicines_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.medicines_id_seq OWNED BY public.medicines.id;
          public          postgres    false    230            �            1259    16400 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    16399    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    216            i           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    215            �            1259    16417    password_reset_tokens    TABLE     �   CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 )   DROP TABLE public.password_reset_tokens;
       public         heap    postgres    false            �            1259    16437    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    postgres    false            �            1259    16436    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          postgres    false    223            j           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          postgres    false    222            �            1259    16503    polis    TABLE     �   CREATE TABLE public.polis (
    id bigint NOT NULL,
    nama character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.polis;
       public         heap    postgres    false            �            1259    16502    polis_id_seq    SEQUENCE     u   CREATE SEQUENCE public.polis_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.polis_id_seq;
       public          postgres    false    235            k           0    0    polis_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.polis_id_seq OWNED BY public.polis.id;
          public          postgres    false    234            �            1259    16489 	   purchases    TABLE     �  CREATE TABLE public.purchases (
    id bigint NOT NULL,
    medicine_id bigint NOT NULL,
    buyer_name character varying(255) NOT NULL,
    buyer_phone character varying(255) NOT NULL,
    buyer_address text NOT NULL,
    quantity integer NOT NULL,
    total_price numeric(10,2) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.purchases;
       public         heap    postgres    false            �            1259    16488    purchases_id_seq    SEQUENCE     y   CREATE SEQUENCE public.purchases_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.purchases_id_seq;
       public          postgres    false    233            l           0    0    purchases_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.purchases_id_seq OWNED BY public.purchases.id;
          public          postgres    false    232            �            1259    16407    users    TABLE     v  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    "position" character varying(255),
    department character varying(255),
    biography text,
    qualification1 character varying(255),
    qualification2 character varying(255),
    phone character varying(255),
    address character varying(255)
);
    DROP TABLE public.users;
       public         heap    postgres    false            �            1259    16406    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    218            m           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    217            �           2604    16452 	   admins id    DEFAULT     f   ALTER TABLE ONLY public.admins ALTER COLUMN id SET DEFAULT nextval('public.admins_id_seq'::regclass);
 8   ALTER TABLE public.admins ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    225    224    225            �           2604    16513    antrians id    DEFAULT     j   ALTER TABLE ONLY public.antrians ALTER COLUMN id SET DEFAULT nextval('public.antrians_id_seq'::regclass);
 :   ALTER TABLE public.antrians ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    236    237    237            �           2604    16463    bookings id    DEFAULT     j   ALTER TABLE ONLY public.bookings ALTER COLUMN id SET DEFAULT nextval('public.bookings_id_seq'::regclass);
 :   ALTER TABLE public.bookings ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    226    227    227            �           2604    16472 
   doctors id    DEFAULT     h   ALTER TABLE ONLY public.doctors ALTER COLUMN id SET DEFAULT nextval('public.doctors_id_seq'::regclass);
 9   ALTER TABLE public.doctors ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    228    229    229            �           2604    16428    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    220    221    221            �           2604    16483    medicines id    DEFAULT     l   ALTER TABLE ONLY public.medicines ALTER COLUMN id SET DEFAULT nextval('public.medicines_id_seq'::regclass);
 ;   ALTER TABLE public.medicines ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    231    230    231            �           2604    16403    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    216    215    216            �           2604    16440    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    222    223    223            �           2604    16506    polis id    DEFAULT     d   ALTER TABLE ONLY public.polis ALTER COLUMN id SET DEFAULT nextval('public.polis_id_seq'::regclass);
 7   ALTER TABLE public.polis ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    234    235    235            �           2604    16492    purchases id    DEFAULT     l   ALTER TABLE ONLY public.purchases ALTER COLUMN id SET DEFAULT nextval('public.purchases_id_seq'::regclass);
 ;   ALTER TABLE public.purchases ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    232    233    233            �           2604    16410    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    218    218            P          0    16449    admins 
   TABLE DATA           v   COPY public.admins (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
    public          postgres    false    225   -o       \          0    16510    antrians 
   TABLE DATA           u   COPY public.antrians (id, nama, email, telepon, poli_id, tanggal, nomor_antrian, created_at, updated_at) FROM stdin;
    public          postgres    false    237   �o       R          0    16460    bookings 
   TABLE DATA           f   COPY public.bookings (id, name, email, phone, date, tenaga_kerja, created_at, updated_at) FROM stdin;
    public          postgres    false    227   &p       T          0    16469    doctors 
   TABLE DATA           y   COPY public.doctors (id, name, email, specialization, created_at, updated_at, image, address, working_hours) FROM stdin;
    public          postgres    false    229   �p       L          0    16425    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          postgres    false    221   r       V          0    16480 	   medicines 
   TABLE DATA           g   COPY public.medicines (id, name, description, stock, price, image, created_at, updated_at) FROM stdin;
    public          postgres    false    231   .r       G          0    16400 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    216   �s       J          0    16417    password_reset_tokens 
   TABLE DATA           I   COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
    public          postgres    false    219   Ku       N          0    16437    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    public          postgres    false    223   hu       Z          0    16503    polis 
   TABLE DATA           A   COPY public.polis (id, nama, created_at, updated_at) FROM stdin;
    public          postgres    false    235   �u       X          0    16489 	   purchases 
   TABLE DATA           �   COPY public.purchases (id, medicine_id, buyer_name, buyer_phone, buyer_address, quantity, total_price, created_at, updated_at) FROM stdin;
    public          postgres    false    233   �u       I          0    16407    users 
   TABLE DATA           �   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at, "position", department, biography, qualification1, qualification2, phone, address) FROM stdin;
    public          postgres    false    218   nv       n           0    0    admins_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.admins_id_seq', 2, true);
          public          postgres    false    224            o           0    0    antrians_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.antrians_id_seq', 34, true);
          public          postgres    false    236            p           0    0    bookings_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.bookings_id_seq', 15, true);
          public          postgres    false    226            q           0    0    doctors_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.doctors_id_seq', 25, true);
          public          postgres    false    228            r           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    220            s           0    0    medicines_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.medicines_id_seq', 13, true);
          public          postgres    false    230            t           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 16, true);
          public          postgres    false    215            u           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          postgres    false    222            v           0    0    polis_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.polis_id_seq', 3, true);
          public          postgres    false    234            w           0    0    purchases_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.purchases_id_seq', 6, true);
          public          postgres    false    232            x           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 8, true);
          public          postgres    false    217            �           2606    16458    admins admins_email_unique 
   CONSTRAINT     V   ALTER TABLE ONLY public.admins
    ADD CONSTRAINT admins_email_unique UNIQUE (email);
 D   ALTER TABLE ONLY public.admins DROP CONSTRAINT admins_email_unique;
       public            postgres    false    225            �           2606    16456    admins admins_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.admins
    ADD CONSTRAINT admins_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.admins DROP CONSTRAINT admins_pkey;
       public            postgres    false    225            �           2606    16517    antrians antrians_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.antrians
    ADD CONSTRAINT antrians_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.antrians DROP CONSTRAINT antrians_pkey;
       public            postgres    false    237            �           2606    16467    bookings bookings_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.bookings
    ADD CONSTRAINT bookings_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.bookings DROP CONSTRAINT bookings_pkey;
       public            postgres    false    227            �           2606    16478    doctors doctors_email_unique 
   CONSTRAINT     X   ALTER TABLE ONLY public.doctors
    ADD CONSTRAINT doctors_email_unique UNIQUE (email);
 F   ALTER TABLE ONLY public.doctors DROP CONSTRAINT doctors_email_unique;
       public            postgres    false    229            �           2606    16476    doctors doctors_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.doctors
    ADD CONSTRAINT doctors_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.doctors DROP CONSTRAINT doctors_pkey;
       public            postgres    false    229            �           2606    16433    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    221            �           2606    16435 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            postgres    false    221            �           2606    16487    medicines medicines_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.medicines
    ADD CONSTRAINT medicines_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.medicines DROP CONSTRAINT medicines_pkey;
       public            postgres    false    231            �           2606    16405    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    216            �           2606    16423 0   password_reset_tokens password_reset_tokens_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);
 Z   ALTER TABLE ONLY public.password_reset_tokens DROP CONSTRAINT password_reset_tokens_pkey;
       public            postgres    false    219            �           2606    16444 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            postgres    false    223            �           2606    16447 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            postgres    false    223            �           2606    16508    polis polis_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.polis
    ADD CONSTRAINT polis_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.polis DROP CONSTRAINT polis_pkey;
       public            postgres    false    235            �           2606    16496    purchases purchases_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.purchases
    ADD CONSTRAINT purchases_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.purchases DROP CONSTRAINT purchases_pkey;
       public            postgres    false    233            �           2606    16416    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    218            �           2606    16414    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    218            �           1259    16445 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            postgres    false    223    223            �           2606    16518 !   antrians antrians_poli_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.antrians
    ADD CONSTRAINT antrians_poli_id_foreign FOREIGN KEY (poli_id) REFERENCES public.polis(id);
 K   ALTER TABLE ONLY public.antrians DROP CONSTRAINT antrians_poli_id_foreign;
       public          postgres    false    237    4786    235            �           2606    16497 '   purchases purchases_medicine_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.purchases
    ADD CONSTRAINT purchases_medicine_id_foreign FOREIGN KEY (medicine_id) REFERENCES public.medicines(id) ON DELETE CASCADE;
 Q   ALTER TABLE ONLY public.purchases DROP CONSTRAINT purchases_medicine_id_foreign;
       public          postgres    false    231    233    4782            P   j   x�3�tLI�K/.�LL���sH�M���K�����T1�T14PI��+6��v�)qL���4p�*�3N����,M֋4(�I��t��+I�7����#�=... ���      \   o   x�36�LLI�K��z�ƦFF��F�%�z�y%�Ez��z�)�� &89��Lt�t��Q8
�V�V�F�ĸ�����(����-8Mp�chhed`eh�M�+F��� RI1�      R   n   x�m�1�0F��9E.P�6M�;�VVf�_TB�P����WL,��4�uE}�[���N�d&�v����O.+I6�QR��B&62洔7ZA�����9G�f�Y��C;x� �      T   ]  x����N1��ݧ�@��˲=�AB@/^~�BٶKv�!���($��t����̔ed����j�j_��wx��Ц�^Y2�J�j�b[Kx�E'�wxNӾ̘��\�R���9K����o�+�r�C�ط K�5�t�Z'L��6���d{���\��@��/��dΏ�y�̡���p�ޣ�"NG�Vm�9c��|��?S��"V=���e(�D�\f�����y���J��m�S@�U��'�ik��#%��6ܦ�[*oJ=����-���n�~�2ƾ��0�6����A5�.�����#�p������Q[4��T�4��$H!Nt�����n�V�M޺I�|��¶      L      x������ � �      V   �  x������0Ec�� fJޙ8�*�Nz�ЂzT �_�f��3xN��jJ��B˾a������<aL#�f6=��ܚ7�������L���a�'�6�	f��㻙OS�D���>�L9����*��0�Y+�8�d-ۢn�R�߂eJ��$����h;�;����U��w�����	7�`� ���{���K���ل7ɞ�:c��՚�l��ѼO���;\�����{[>�ˊ˂ ;Uؕ�D�I�~����j"��Ģ�i;j`��Z�����<��v����jm*�T�72���}�:�v�`,L�ە��B���~R��]Q��+D&��@���t�"���8jn��C��t�@���"� �9�灰Z��`Q�g���i��ʤd+�5�_�,�D�~+�����u���Z5ϩEs�I�ɒ~���9˲���(�      G   R  x�]�َ� E���a�,�2�Emi� �h�~L۬��:׾�����ׇ]rfv��.e��ep_���8��c��\v3αwa�"l�7X΃�j��,>�e��/M������h���|n�I)HS�^�՚�|�Ǝ~%�V��#U+�B^b�}�-�d��j:u+�����q�H���R�c-����=	4k7A1�k���Oe@,R����(�E*|_ e�q8:�;�B��@+��-�g��&�t�@lt�\���S�B�䙔jM?�ɛ���&Õ|>�x��@�fZ�׸�-������\��3R¾����M��g���]z���� ��1�gr�f      J      x������ � �      N      x������ � �      Z   \   x�3����Tp�K��4202�50�54W00�2��2��&�e�㓘W��H�.c�.�����@��gVer���)D�3�4/�8�&���� 2).�      X   m   x�m�;�0Ck�)� �v�`|�4�	�|��C�gRI�����o���_���o�w�KA��	�-��BØ�S&#TQ��e]��Oy9J�?�Ԩ%��Ϙ\:� ��$,      I   �   x�E�M�@���؃W��Mw�=E���xyK4Ï���i1��aFL��i�@����¢�/ME����7��r�
Ax��p�����e����=��~����9�� ��y�� Z�{ܱ@Xܥ�4s4�&)s���3%@�M+�`< �'.��ܰĚ~�Hl�0>��1     