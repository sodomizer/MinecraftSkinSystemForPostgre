--
-- Структура таблицы data
--

CREATE TABLE data
(
  property character varying(255) DEFAULT NULL::character varying,
  value character varying(255) DEFAULT NULL::character varying
)
WITH (
  OIDS=FALSE
);
ALTER TABLE data
  OWNER TO postgres;

--
-- Дамп данных таблицы data
--

INSERT INTO data (property, value) VALUES
('latest-game-build', '10746'),
('launcher-version', '13');
-- --------------------------------------------------------