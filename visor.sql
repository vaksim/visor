--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: locomotive_names; Type: TABLE; Schema: public; Owner: visor; Tablespace: 
--

CREATE TABLE locomotive_names (
    id integer NOT NULL,
    name text NOT NULL
);


ALTER TABLE locomotive_names OWNER TO visor;

--
-- Name: locomotive_names_id_seq; Type: SEQUENCE; Schema: public; Owner: visor
--

CREATE SEQUENCE locomotive_names_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE locomotive_names_id_seq OWNER TO visor;

--
-- Name: locomotive_names_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: visor
--

ALTER SEQUENCE locomotive_names_id_seq OWNED BY locomotive_names.id;


--
-- Name: locomotives; Type: TABLE; Schema: public; Owner: visor; Tablespace: 
--

CREATE TABLE locomotives (
    id integer NOT NULL,
    locomotive_names_id integer,
    number text NOT NULL
);


ALTER TABLE locomotives OWNER TO visor;

--
-- Name: locomotives_id_seq; Type: SEQUENCE; Schema: public; Owner: visor
--

CREATE SEQUENCE locomotives_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE locomotives_id_seq OWNER TO visor;

--
-- Name: locomotives_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: visor
--

ALTER SEQUENCE locomotives_id_seq OWNED BY locomotives.id;


--
-- Name: pages; Type: TABLE; Schema: public; Owner: visor; Tablespace: 
--

CREATE TABLE pages (
    id integer NOT NULL,
    name text NOT NULL,
    title text
);


ALTER TABLE pages OWNER TO visor;

--
-- Name: pages_id_seq; Type: SEQUENCE; Schema: public; Owner: visor
--

CREATE SEQUENCE pages_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pages_id_seq OWNER TO visor;

--
-- Name: pages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: visor
--

ALTER SEQUENCE pages_id_seq OWNED BY pages.id;


--
-- Name: repairs; Type: TABLE; Schema: public; Owner: visor; Tablespace: 
--

CREATE TABLE repairs (
    id integer NOT NULL,
    locomotives_id integer NOT NULL,
    date_beginning date,
    date_ending date,
    subdivisions_id integer
);


ALTER TABLE repairs OWNER TO visor;

--
-- Name: repairs_id_seq; Type: SEQUENCE; Schema: public; Owner: visor
--

CREATE SEQUENCE repairs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE repairs_id_seq OWNER TO visor;

--
-- Name: repairs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: visor
--

ALTER SEQUENCE repairs_id_seq OWNED BY repairs.id;


--
-- Name: subdivisions; Type: TABLE; Schema: public; Owner: visor; Tablespace: 
--

CREATE TABLE subdivisions (
    id integer NOT NULL,
    name text NOT NULL
);


ALTER TABLE subdivisions OWNER TO visor;

--
-- Name: subdivisions_id_seq; Type: SEQUENCE; Schema: public; Owner: visor
--

CREATE SEQUENCE subdivisions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE subdivisions_id_seq OWNER TO visor;

--
-- Name: subdivisions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: visor
--

ALTER SEQUENCE subdivisions_id_seq OWNED BY subdivisions.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: visor; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    name text NOT NULL,
    password text NOT NULL,
    full_name text,
    job_title text
);


ALTER TABLE users OWNER TO visor;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: visor
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO visor;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: visor
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: visor
--

ALTER TABLE ONLY locomotive_names ALTER COLUMN id SET DEFAULT nextval('locomotive_names_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: visor
--

ALTER TABLE ONLY locomotives ALTER COLUMN id SET DEFAULT nextval('locomotives_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: visor
--

ALTER TABLE ONLY pages ALTER COLUMN id SET DEFAULT nextval('pages_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: visor
--

ALTER TABLE ONLY repairs ALTER COLUMN id SET DEFAULT nextval('repairs_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: visor
--

ALTER TABLE ONLY subdivisions ALTER COLUMN id SET DEFAULT nextval('subdivisions_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: visor
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: locomotive_names; Type: TABLE DATA; Schema: public; Owner: visor
--

COPY locomotive_names (id, name) FROM stdin;
1	ПБ
2	ПОМ-1
3	СМ-07
\.


--
-- Name: locomotive_names_id_seq; Type: SEQUENCE SET; Schema: public; Owner: visor
--

SELECT pg_catalog.setval('locomotive_names_id_seq', 3, true);


--
-- Data for Name: locomotives; Type: TABLE DATA; Schema: public; Owner: visor
--

COPY locomotives (id, locomotive_names_id, number) FROM stdin;
2	1	666666
1	1	123321
\.


--
-- Name: locomotives_id_seq; Type: SEQUENCE SET; Schema: public; Owner: visor
--

SELECT pg_catalog.setval('locomotives_id_seq', 2, true);


--
-- Data for Name: pages; Type: TABLE DATA; Schema: public; Owner: visor
--

COPY pages (id, name, title) FROM stdin;
1	PageRepairs	Ремонты
\.


--
-- Name: pages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: visor
--

SELECT pg_catalog.setval('pages_id_seq', 1, true);


--
-- Data for Name: repairs; Type: TABLE DATA; Schema: public; Owner: visor
--

COPY repairs (id, locomotives_id, date_beginning, date_ending, subdivisions_id) FROM stdin;
1	1	2014-12-12	2015-02-15	1
\.


--
-- Name: repairs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: visor
--

SELECT pg_catalog.setval('repairs_id_seq', 1, true);


--
-- Data for Name: subdivisions; Type: TABLE DATA; Schema: public; Owner: visor
--

COPY subdivisions (id, name) FROM stdin;
1	Черепаново
2	Чулым
\.


--
-- Name: subdivisions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: visor
--

SELECT pg_catalog.setval('subdivisions_id_seq', 2, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: visor
--

COPY users (id, name, password, full_name, job_title) FROM stdin;
1	maximus	123	Васюк Максим Анатольевич	Ведущий инженер по ОВТ
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: visor
--

SELECT pg_catalog.setval('users_id_seq', 1, true);


--
-- Name: locomotive_names_id_pkey; Type: CONSTRAINT; Schema: public; Owner: visor; Tablespace: 
--

ALTER TABLE ONLY locomotive_names
    ADD CONSTRAINT locomotive_names_id_pkey PRIMARY KEY (id);


--
-- Name: locomotives_id_pkey; Type: CONSTRAINT; Schema: public; Owner: visor; Tablespace: 
--

ALTER TABLE ONLY locomotives
    ADD CONSTRAINT locomotives_id_pkey PRIMARY KEY (id);


--
-- Name: pages_id_pkey; Type: CONSTRAINT; Schema: public; Owner: visor; Tablespace: 
--

ALTER TABLE ONLY pages
    ADD CONSTRAINT pages_id_pkey PRIMARY KEY (id);


--
-- Name: repairs_id_pkey; Type: CONSTRAINT; Schema: public; Owner: visor; Tablespace: 
--

ALTER TABLE ONLY repairs
    ADD CONSTRAINT repairs_id_pkey PRIMARY KEY (id);


--
-- Name: subdivisions_id_pkey; Type: CONSTRAINT; Schema: public; Owner: visor; Tablespace: 
--

ALTER TABLE ONLY subdivisions
    ADD CONSTRAINT subdivisions_id_pkey PRIMARY KEY (id);


--
-- Name: users_id_pkey; Type: CONSTRAINT; Schema: public; Owner: visor; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_id_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: user
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM "user";
GRANT ALL ON SCHEMA public TO "user";
GRANT ALL ON SCHEMA public TO visor;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

